<?php 
session_start();
include_once 'functions.php';
?>
<table class="table table-bordered table-striped table-hover dataTable js-exportable">
    <thead>
        <tr>
            <th>Select</th>
            <th>Id</th>
            <th>Chapter</th>
            <th>Topic</th>
            <th>Question</th>
            <th>Image</th>
            <th>Answer</th>
            <th>Youtube</th>
            <th>Marks</th>

        </tr>
    </thead>
    <tfoot>
        <tr>
            <th>Select</th>
            <th>Id</th>
            <th>Chapter</th>
            <th>Topic</th>
            <th>Question</th>
            <th>Image</th>
            <th>Answer</th>
            <th>Youtube</th>
            <th>Marks</th>


        </tr>
    </tfoot>
    <tbody>
        <!-- Items to be displayed: id,chapter,topic,question,image,answer,youtube -->
        <?php

        $i=0;
        foreach ($_SESSION["questionCart"] as $qid) {
            $question_id=array("qid"=>$qid);
            $question_feed=apicall("getquestionbyid",$question_id);

            $topic=$question_feed['data'][0]['topic'];
            $class=$question_feed['data'][0]['class'];
            $type=$question_feed['data'][0]['type'];
            $subject=$question_feed['data'][0]['subject'];
            $chapter=$question_feed['data'][0]['chapter'];
            $level=$question_feed['data'][0]['level'];
            $marks=$question_feed['data'][0]['marks'];
            $ques_txt=$question_feed['data'][0]['ques_txt'];
            $ques_img=$question_feed['data'][0]['ques_img'];
            $qr=$question_feed['data'][0]['qr'];
            $answer=$question_feed['data'][0]['answer'];
            $youtube=$question_feed['data'][0]['youtube'];
            $i++;
            ?>
            <tr id="<?php echo $qid ?>" >
                <td>
                    <button class='btn btn-danger waves-effect' id="<?php echo 'removeQuestion'.$qid ?>" onclick='removeQuestionFromDisplay(<?php echo $qid ?>)'>Remove</button>

                </td>
                <td><?php echo $i; ?></td>
                <td><?php echo $chapter ?></td>
                <td><?php echo $topic ?></td>
                <td><?php echo  htmlspecialchars_decode($ques_txt) ?></td>
                <td><a href='<?php echo $ques_img ?>' class='thumbnail' target='_blank'><img src='<?php echo $ques_img ?>'></a></td>
                <td><?php echo $answer ?></td>
                <td><?php echo $youtube ?></td>
                <td><?php echo $marks ?></td>



            </tr>
            <?php
        }
        ?>
    </tbody>
</table>