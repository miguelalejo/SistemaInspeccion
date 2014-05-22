<table>
  <tbody>
    <tr>
      <th>C&oacute;digo curso:</th>
      <td><?php echo $curso->getCodigoCurso() ?></td>
    </tr>
    <tr>
      <th>Curso:</th>
      <td><?php echo $curso->getCurso() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('curso/edit?codigo_curso='.$curso->getCodigoCurso()) ?>" class="btn btn-primary">Editar</a>
&nbsp;
<a href="<?php echo url_for('curso/index') ?>" class="btn btn-primary">Lista</a>
