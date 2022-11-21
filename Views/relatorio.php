<h1>Relatório</h1>

<br>
<table border="1" width="500">
    <tr>
        <th>Nome do Produto</th>
        <th>Qtd.</th>
        <th>Qtd. Mínima</th>
        <th>Diferença</th>
    </tr>
    <?php foreach($list as $item): ?>
        <tr>
            <td><?=$item['produto'];?></td>
            <td><?=$item['quantidade'];?></td>
            <td><?=$item['min_quantidade'];?></td>
            <td><?php echo (floatVal($item['min_quantidade']) - floatVal($item['quantidade'])); ?></td>
        </tr>
    <?php endforeach; ?>    
</table>

<script type="text/javascript">
    window.print();
</script>