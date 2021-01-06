<?php

declare(strict_types=1);

class BookController extends AbstractController
{
    public function listAction(): void
    {

        $bookList = $this->abstractModel->list();
        // var_dump($bookList);
        $this->view->render(
            'list',
            ['books' => $bookList]
        );
    }

    public function editAction(): void
    {

        if ($this->request->isPost()) {

            $bookId = (int) $this->request->postParam('id');



            $bookData = [
                'title' => $this->request->postParam('title'),
                'author' => $this->request->postParam('author'),
                'description' => $this->request->postParam('description'),
                'date' => $this->request->postParam('date')
            ];

            var_dump($bookData);
            $this->abstractModel->edit($bookId, $bookData);
            header("Location: /");
        }

        $this->view->render(
            'edit',
            ['book' => $this->getBook()]
        );
    }

    public function createAction(): void
    {
        if ($this->request->hasPost()) {
            $noteData = [
                'title' => $this->request->postParam('title'),
                'author' => $this->request->postParam('author'),
                'description' => $this->request->postParam('description'),
                'date' => $this->request->postParam('date')
            ];
            $this->abstractModel->create($noteData);
            header("Location: /");
        }
        $this->view->render('create');
    }

    public function deleteAction(): void
    {
        $id = (int) $this->request->getParam('id');
        // var_dump($id);
        $this->abstractModel->delete($id);
        header("Location: /");
    }

    public function showAction(): void
    {
        $this->view->render('show', ['note' => $this->getBook()]);
    }

    private function getBook(): array
    {
        $noteId = (int) $this->request->getParam('id');
        return  $this->abstractModel->get($noteId);
    }
}