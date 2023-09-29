<?php

namespace App\Services;

use App\Models\Book;

class BookService
{

    //adding book
    public function add(array $data)
    {
        $book = Book::create([
            'title' => $data['title'],
            'author' => $data['author'],
            'description' => $data['description'],
            'cover_image' => $data['cover_image'],
            'price' => $data['price'],
        ]);
        return $book;
    }


    //Getting all Books
    public function getAll()
    {
        return Book::all();
    }


    //Getting a single book
    public function show($id)
    {
        return Book::find($id);
    }


    //Updating book
    public function update($id, array $data)
    {
        $book = Book::find($id);
        if (!$book) {
            return -1;
        }
        $book->title = $data['title'];
        $book->author = $data['author'];
        $book->description = $data['description'];
        $book->cover_image = $data['cover_image'];
        $book->price = $data['price'];

        return $book->save();

    }


    //deleting book
    public function delete($id)
    {
        $book = Book::find($id);
        if (!$book) {
            return -1;
        }
        return $book->delete();
    }

}