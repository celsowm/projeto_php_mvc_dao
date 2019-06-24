<h1>Editoras</h1>
<div class="row col-md-12 centered">
    <table class="table table-striped custab">
        <thead>
        <!-- a href="editora/inserir/" class="btn btn-primary btn-xs pull-right"><b>+</b> Add new task</a -->
        <tr>
            <th>id</th>
            <th>nome</th>
            <th>cpnj</th>
            <th>website</th>
            <th class="text-center">Ações</th>
        </tr>
        </thead>
        <?php
        foreach ($editoras as $editora){
            echo '<tr>';
            echo "<td> {$editora->id} </td>";
            echo "<td> {$editora->nome} </td>";
            echo "<td> {$editora->cnpj} </td>";
            echo "<td> {$editora->website} </td>";
            //echo "<td class='text-center'><a class='btn btn-info btn-xs' href='/MVC_todo/tasks/edit/" . $task["id"] . "' ><span class='glyphicon glyphicon-edit'></span> Edit</a> <a href='/MVC_todo/tasks/delete/" . $task["id"] . "' class='btn btn-danger btn-xs'><span class='glyphicon glyphicon-remove'></span> Del</a></td>";
            echo "</tr>";
        }
        ?>
    </table>
</div>