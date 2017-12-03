 <div class="menu">
                <ul class="list">
                    <li class="header">Welcome Paper Creator</li>
                    <li class="active">
                        <a href="index.php">
                            <i class="material-icons">home</i>
                            <span>Home</span>
                        </a>
                         

                    </li>
                    <li>
                    	<a href="create-question-paper.php">
                        	<i class="material-icons">settings_applications</i>
                        	<span>Create Paper</span>
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
