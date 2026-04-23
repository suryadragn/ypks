import re
import sys

def convert_mysql_to_pg(mysql_file, pg_file):
    # Read with utf-16 since that's what mysqldump on windows often produces
    with open(mysql_file, 'r', encoding='utf-16', errors='ignore') as f:
        content = f.read()

    # 1. Remove MySQL specific lines and comments
    content = re.sub(r'/\*!.*?\*/;', '', content)
    content = re.sub(r'LOCK TABLES .*? WRITE;', '', content)
    content = re.sub(r'UNLOCK TABLES;', '', content)
    content = re.sub(r'SET @OLD_.*?;', '', content)
    content = re.sub(r'DROP TABLE IF EXISTS `(.*?)`;', r'DROP TABLE IF EXISTS "\1" CASCADE;', content)
    
    # Remove remaining comments
    content = re.sub(r'/\*!.*?\*/', '', content)

    # 2. Backticks to double quotes
    content = content.replace('`', '"')

    # 3. AUTO_INCREMENT to SERIAL
    content = re.sub(r'"(\w+)" int\(\d+\) NOT NULL AUTO_INCREMENT', r'"\1" SERIAL', content)
    content = re.sub(r'"(\w+)" INTEGER NOT NULL AUTO_INCREMENT', r'"\1" SERIAL', content)
    content = content.replace('AUTO_INCREMENT', 'SERIAL')

    # 4. Data types
    # Mapping tinyint(1) to SMALLINT is safer for PG inserts using 0/1
    content = re.sub(r'\btinyint\(\d+\)', 'SMALLINT', content)
    content = re.sub(r'\btinyint\b', 'SMALLINT', content)
    content = re.sub(r'\bsmallint\(\d+\)', 'SMALLINT', content)
    content = content.replace('datetime', 'TIMESTAMP')
    content = re.sub(r'\bint\(\d+\)', 'INTEGER', content)
    content = re.sub(r'\bdouble\(\d+,\d+\)', 'DOUBLE PRECISION', content)
    
    # 5. Handle quote escaping (\' -> '')
    content = content.replace("\\'", "''")
    
    # 6. Remove MySQL table options
    content = re.sub(r'\) ENGINE=[^;]+;', r');', content)
    
    # 7. Remove MySQL specific Key/Index syntax (PG doesn't support them inside CREATE TABLE this way)
    # Convert UNIQUE KEY "name" ("col") to UNIQUE ("col")
    content = re.sub(r'UNIQUE KEY ".*?" \((.*?)\)', r'UNIQUE (\1)', content)
    # Remove regular KEY "name" ("col") lines
    content = re.sub(r',\s+KEY ".*?" \(.*?\)', '', content)
    content = re.sub(r'KEY ".*?" \(.*?\),?\s+', '', content)
    # Remove FULLTEXT KEY
    content = re.sub(r'FULLTEXT KEY ".*?" \(.*?\),?', '', content)

    # 8. Clean up trailing commas before closing parenthesis
    content = re.sub(r',\s+\)', r'\n  )', content)
    
    # Final cleanup
    content = content.replace(';;', ';')

    with open(pg_file, 'w', encoding='utf-8') as f:
        f.write(content)

if __name__ == "__main__":
    convert_mysql_to_pg('ypks_mysql_dump.sql', 'ypks_postgresql_dump.sql')
