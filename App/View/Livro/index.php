<h1>Livros</h1>
<div class="row col-md-12 centered">
    <table class="table table-striped custab">
        <thead>
        <!-- a href="editora/inserir/" class="btn btn-primary btn-xs pull-right"><b>+</b> Add new task</a -->
        <tr>
            <th>id</th>
            <th>título</th>
            <th>autores</th>
            <th>editora</th>
            <th class="text-center">Ações</th>
        </tr>
        </thead>
        <?php
        foreach ($livros as $livro){
            echo '<tr>';
            echo "<td> {$livro->id} </td>";
            echo "<td> {$livro->titulo} </td>";
            echo "<td>" .implode("; ", array_column($livro->autores, 'nome')). "</td>";
            echo "<td> {$livro->editora->nome} </td>";
            //echo "<td class='text-center'><a class='btn btn-info btn-xs' href='/MVC_todo/tasks/edit/" . $task["id"] . "' ><span class='glyphicon glyphicon-edit'></span> Edit</a> <a href='/MVC_todo/tasks/delete/" . $task["id"] . "' class='btn btn-danger btn-xs'><span class='glyphicon glyphicon-remove'></span> Del</a></td>";
            echo "</tr>";
        }
        ?>
    </table>
</div>