 <div class="menu">
                <ul class="list">
                    <li class="active">
                        <a href="index.php">
                            <i class="material-icons">home</i>
                            <span>Home</span>
                        </a>
                         

                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                        	<i class="material-icons">settings_applications</i>
                        	<span>Create Paper</span>
                        </a>
                        
                        <ul class="ml-menu">
                            <li>
                                <?php 
                                $feedsubjects = apicall("viewsubject"); 
                                $size = $feedsubjects['data']['size']; 
                                for($i=0; $i<$size; $i++) {?>
                                    <a href="create-question-paper.php?subj=<?php echo $feedsubjects['data'][$i]['name'] ?>">
                                        <span><?php echo $feedsubjects['data'][$i]['name'] ?></span>
                                    </a>
                                <?php
                                }
                                ?>
                            </li>
                        </ul>
                    </li>

                    <li>
                    	<a href="viewquestion.php">
                        	<i class="material-icons">question_answer</i>
                        	<span>All Questions</span>
                    	</a>
                    </li>

                      <li>
                    	<a href="addquestion.php">
                        	<i class="material-icons">note_add</i>
                        	<span>Add New Questions</span>
                    	</a>
                    </li>


                    <li>
                    	<a href="inlineeditquestion.php">
                        	<i class="material-icons">border_color</i>
                        	<span>Inline Edit Question</span>
                    	</a>
                    </li>

                    <li>
                    	<a href="viewsubject.php">
                        	<i class="material-icons">subject</i>
                        	<span>Subjects</span>
                    	</a>
                    </li>

                     <li>
                    	<a href="viewchapter.php">
                        	<i class="material-icons">control_point</i>
                        	<span>Chapters</span>
                    	</a>
                    </li>

                    <li>
                    	<a href="viewtopic.php">
                        	<i class="material-icons">control_point_duplicate</i>
                        	<span>Topics</span>
                    	</a>
                    </li>

                     <li>
                    	<a href="viewquestionpapers.php">
                        	<i class="material-icons">brightness_1</i>
                        	<span>Questions Papers</span>
                    	</a>
                    </li>

                     <?php if(displayPaperButton()) {echo "<li>
                        <a href='display-paper.php'>
                            <i class='material-icons'>blur_on</i>
                            <span>View My Paper</span>
                        </a>
                    </li>"; }?>


                     
                    <li>
                        <a href="bulkuploader.php">
                            <i class="material-icons">file_upload</i>
                            <span>Bulk Upload</span>
                        </a>
                    </li> 

                    <li>
                        <a href="users.php">
                            <i class="material-icons">face</i>
                            <span>Users</span>
                        </a>
                    </li> 

                    


                </ul>
            </div>
            <div class="legal">
                <div class="copyright">
                    &copy; 2017 <a href="javascript:void(0);">MY SCHOOL</a>.
                </div>
                <div class="version">
                    <b>Version: </b> 1.0.0
                </div>
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->
        
    </section>
