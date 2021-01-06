<?php

declare(strict_types=1);


class AbstractModel
{

  protected PDO $conn;

  public function __construct(array $config)
  {
    $this->createConnection($config);
  }

  private function createConnection(array $config)
  {
    $dsn = "mysql:dbname={$config['database']};host={$config['host']}";
    $this->conn = new PDO(
      $dsn,
      $config['user'],
      $config['password'],
      [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
      ]
    );
  }

  public function list()
  {
    return $this->findBy();
  }

  public function create(array $data): void
  {
    $title = $this->conn->quote($data['title']);
    $author = $this->conn->quote($data['author']);
    $description = $this->conn->quote($data['description']);
    $date = $this->conn->quote($data['date']);


    $query = "
      INSERT INTO books(title, author, description, date) VALUES($title, $author, $description, $date)
      ";

    $this->conn->exec($query);
  }

  private function findBy()
  {
    $query = "SELECT id, title, author, description, date FROM books";
    $result = $this->conn->query($query);
    return $result->fetchAll(PDO::FETCH_ASSOC);
  }

  public function delete(int $id): void
  {
    $query = "DELETE FROM books WHERE id = $id LIMIT 1";
    $this->conn->exec($query);
  }

  public function get(int $id): array
  {
    $query = "SELECT * FROM books WHERE id = $id";
    $result = $this->conn->query($query);
    $note = $result->fetch(PDO::FETCH_ASSOC);
    return $note;
  }

  // private function getExcerpt(string $text): string
  // {
  // }


  public function edit(int $id, array $data): void
  {

    $title = $this->conn->quote($data['title']);
    $description = $this->conn->quote($data['description']);
    $author = $this->conn->quote($data['author']);
    $date = $this->conn->quote($data['date']);

    $query = "
        UPDATE books
        SET title = $title, 
        description = $description, 
        author = $author, 
        date = $date
        WHERE id = $id
      ";

    $this->conn->exec($query);
  }
}