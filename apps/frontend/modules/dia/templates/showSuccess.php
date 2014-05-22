<table>
  <tbody>
    <tr>
      <th>Codigo dia:</th>
      <td><?php echo $dia->getCodigoDia() ?></td>
    </tr>
    <tr>
      <th>Dia:</th>
      <td><?php echo $dia->getDia() ?></td>
    </tr>
    <tr>
      <th>Horas:</th>
      <td><?php echo $dia->getHoras() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('dia/edit?codigo_dia='.$dia->getCodigoDia()) ?>" class="btn btn-primary">Editar</a>
&nbsp;
<a href="<?php echo url_for('dia/index') ?>" class="btn btn-primary">Lista</a>
