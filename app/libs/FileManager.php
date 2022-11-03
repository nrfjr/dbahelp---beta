<?php

    class FileManager{

        public function loadSQL($sqlFileName) {
            // Check for sql file
            if(file_exists('../app/sql/' . $sqlFileName . '.sql')) {
                return file_get_contents('../app/sql/' . $sqlFileName . '.sql');
            } else {
                // sql file does not exists
                die('Sql file does not exists');
            }
        }

    }