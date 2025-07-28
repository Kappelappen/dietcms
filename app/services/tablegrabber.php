<?php

new TableGrabber($pdo);

class TableGrabber {
    
    private $pdo;
    
    public function __construct(PDO $pdo) {
        
        $this->pdo = $pdo;
        $this->createTablesOnce();
        
    }

    public function createTablesOnce() {

        if ($this->tableExists("article")) {
            return;
        }

        $this->executeSqlFile(__DIR__ . '/../public/resources/sql/dietcms.sql');
        $this->executeSqlFile(__DIR__ . '/../public/resources/sql/articles.sql');        

    }

    private function tableExists(string $tableName) {

        try {

        $result = $this->pdo->query("SHOW TABLES LIKE '$tableName'");
        return $result && $result->rowCount() > 0;

        } catch (PDOException $e) {
            echo "Error checking table: " . $e->getMessage() . "\n";
            return false;
        }
    }

    private function executeSqlFile($file) {

        if (!file_exists($file)) {
            throw new RuntimeException("SQL file not found: {$file}");
        }

        $sql = file_get_contents($file);
        $statements = array_filter(array_map('trim', explode(';', $sql)));

        try {
            foreach ($statements as $statement) {
                if (!empty($statement)) {
                    $this->pdo->exec($statement);
                }
            }
            echo "Tables created successfully.\n";
        } catch (PDOException $e) {
            echo "Error creating tables: " . $e->getMessage() . "\n";
        }
    }
}

?>