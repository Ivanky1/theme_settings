<style type="text/css">
        .contentsss {
            cursor: pointer;
            overflow: hidden;
            background: transparent;
            padding: 0 5px;margin-bottom: 10px;height:63px;
        }
        .contentsss:hover {
            overflow: auto;
            background: #fff;

        }
    </style>
<?php foreach($rows as $row) : ?>    
    <div typeof="sioc:Item foaf:Document" about="/analytics/leaks_monitoring/8484" class="node node-news node-teaser contextual-links-region">
        <span class="submitted">
                  <span rel="sioc:has_creator" datatype="xsd:dateTime" content="2014-10-08T13:16:03+04:00" property="dc:date dc:created">
                      <?php echo $row['created'] ?>
                  </span>
        </span>
        <h2 datatype="" property="dc:title"> <?php echo $row['title'] ?></h2>
        <div class="contentsss clearfix">
            <div class="field field-name-body field-type-text-with-summary field-label-hidden">
                <div class="field-items">
                    <div property="content:encoded" class="field-item even">
                        <?php echo $row['body'] ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endforeach ?>

<script type="text/javascript" src="http://code.jquery.com/jquery-2.1.0.min.js"></script>

<script type="text/javascript">

    /*$('.contentsss').hover(function() {
       $(this).css('overflow', 'scroll');

    },function() {
        $(this).css('overflow', 'hidden');

    } )*/




</script>