<?php foreach($rows as $row) : ?>
    <div class="node view-all-events">
        <span class="submitted">
            <span rel="sioc:has_creator" datatype="xsd:dateTime" property="dc:date dc:created">
                <?php echo $row['created'] ?>
            </span>
        </span>
        <h2 datatype="" property="dc:title">
            <?php echo $row['title'] ?>
        </h2>
        <div class="content clearfix">
            <p><?php echo strip_tags($row['body']); ?></p>
        </div>
    </div>
<?php endforeach ?>

