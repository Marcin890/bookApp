     <table class="books">
         <thead>
             <tr>
                 <th>Title</th>
                 <th>Author</th>
                 <th>Description</th>
                 <th>Date</th>
                 <th></th>
                 <th></th>

             </tr>
         </thead>
         <tbody>

             <?php foreach ($params['books'] ?? [] as $book) : ?>
             <tr>
                 <td><?php echo $book['title'] ?></td>
                 <td><?php echo $book['author'] ?></td>
                 <td><?php echo substr($book['description'], 0, 50) . '...'?></td>
                 <td><?php echo $book['date'] ?></td>
                 <td> <a href="/?action=show&id=<?php echo $book['id'] ?>">
                         <button class="btn btn--show">Show</button>
                     </a>
                 </td>
                 <td> <a href="/?action=delete&id=<?php echo $book['id'] ?>">
                         <button class="btn btn--delete">Delete</button>
                     </a>
                 </td>
             </tr>
             <?php endforeach; ?>
         </tbody>
     </table>