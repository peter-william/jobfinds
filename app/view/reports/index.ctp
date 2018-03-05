<h1>Reports</h1>
<table>
    <tr>
        <th>Id</th>
        <th>Title</th>
        <th>Description</th>
        <th>Report Name</th>
        <th>Created</th>
		<th colspan="2">Actions</th>
    </tr>
    <?php foreach ($Reports as $Report): ?>
    <tr>
        <td><?php echo $Report['Report']['id']; ?></td>
        <td><?php echo $Report['Report']['title']; ?></td>
        <td><?php echo $Report['Report']['description']; ?></td>
        <td><?php echo $Report['Report']['report']; ?></td>
        <td><?php echo $Report['Report']['created']; ?></td>
		<td><?php echo $this->Html->link('View Details', array('controller' => 'reports', 'action' => 'view', $Report['Report']['id']));?></td>
<td><?php echo $this->Html->link('Download', array('controller' => 'reports', 'action' => 'viewdown', $Report['Report']['id'],true));?></td>
    </tr>
    <?php endforeach; ?>
    <?php unset($user); ?>
</table>