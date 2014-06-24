
<?php echo $this->getContent(); ?>

<div align="right">
    <?php echo $this->tag->linkTo(array('comments/new', 'Create comments')); ?>
</div>

<?php echo $this->tag->form(array('comments/search', 'method' => 'post', 'autocomplete' => 'off')); ?>

<div align="center">
    <h1>Search comments</h1>
</div>

<table>
    <tr>
        <td align="right">
            <label for="id">Id</label>
        </td>
        <td align="left">
            <?php echo $this->tag->textField(array('id', 'type' => 'numeric')); ?>
        </td>
    </tr>
    <tr>
        <td align="right">
            <label for="post_id">Post</label>
        </td>
        <td align="left">
            <?php echo $this->tag->textField(array('post_id', 'type' => 'numeric')); ?>
        </td>
    </tr>
    <tr>
        <td align="right">
            <label for="body">Body</label>
        </td>
        <td align="left">
                <?php echo $this->tag->textField(array('body', 'type' => 'date')); ?>
        </td>
    </tr>

    <tr>
        <td></td>
        <td><?php echo $this->tag->submitButton(array('Search')); ?></td>
    </tr>
</table>

</form>
