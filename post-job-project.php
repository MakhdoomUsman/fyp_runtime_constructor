<?php 

if (isset($_POST['add-project'])) {
	$title = $_POST['title'];
	$skills = $_POST['skills'];
	$price1 = $_POST['price1'];
	$price2 = $_POST['price2'];
	$description = $_POST['description'];

	$add_project = mysqli_query($con, "insert into projects(uid, status, title, from_budget, to_budget, description, tech_stack ) values('$logged_id', 0, '$title', '$price1', '$price2', '$description', '$skills' ) ");

	if ($add_project) {
		?>
		<script>
			alert('Project Posted!');
		</script>
	<?php	
	}

	echo "<meta http-equiv='refresh' content='0'>";

}


// Job Posting

if (isset($_POST['add-job'])) {
    $title = $_POST['job-title'];
    $skills = $_POST['job-skills'];
    $salary = $_POST['salary'];
    $job_type = $_POST['job-type'];
    $description = $_POST['job-description'];

    $add_job = mysqli_query($con, "insert into jobs(uid, status, title, salary, job_type, description, tech_stack ) values('$logged_id', 0, '$title', '$salary', '$job_type', '$description', '$skills' ) ");

    if ($add_job) {
        ?>
        <script>
            alert('Job Posted!');
        </script>
    <?php   
    }

    echo "<meta http-equiv='refresh' content='0'>";

}


?>

<style>

#allSelectedSkills,
#allSelectedSkills-2{
    margin: 0 0 20px 0!important;
    border: 1px solid #eee;
    border-radius: 3px;
    padding: 10px;
}
.selectedSkills{
    border: 1px solid #f0f0f0;
    padding: 8px 15px;
    border-radius: 24px;
    background: #eee;
    margin: 5px 0px!important;
}

.selectedSkills a{
    padding: 1px!important;
    margin-left: 10px;
    border-radius: 50%!important;
}
    
.project-skills-list{
    list-style: none;
    width: 94.5%!important;
    position: absolute;
    z-index: 89;
    top: 30px;
    display: none;
}

.project-skills-list li.skill-name{
    display: block!important;
    margin: 0!important;
}

.project-skills-list li a{
    width: 100%;
}

</style>

<div class="post-popup pst-pj">
    <div class="post-project">
        <h3>Post a project</h3>
        <div class="post-project-fields">
            <form method="POST" autocomplete="off">
                <input autocomplete="false" name="hidden" type="text" style="display:none;">
                <div class="row">
                    <div class="col-lg-12">
                        <input type="text" name="title" placeholder="Title">
                    </div>

                    <div class="col-lg-12">
                        <ul id="allSelectedSkills">
                            <li>Selected Skills: </li>
                            <!-- <li class="selectedSkills">PHP<a href="#" title="" class="close-skill"><i class="la la-close"></i></a></li>-->
                            
                        </ul>
                    </div>

                    <div class="col-lg-12">
                        <input type="text" id="searchSkill" placeholder="Enter Keyword to Select the Skills">
                        <!-- Hidden input to store skills -->
                        <input type="hidden" id="all-selected-skills" name="skills" value="">

                        <ul id="listSkill" class="project-skills-list">
                            <!-- <li id="no-skill-found">No Skill Found.</li> -->
                            <?php 

                            $select_skills = mysqli_query($con, "select * from skills");
                            while($skill = mysqli_fetch_array($select_skills)){

                                $skl_title = $skill['title'];
                                $min_price = $skill['min_price'];
                                $max_price = $skill['max_price'];

                            ?>
                            <li class="skill-name" data-min="<?php echo $min_price; ?>" data-max="<?php echo $max_price; ?>"><a href="#" title=""><?php echo $skl_title; ?></a></li>
                            <?php 

                            }

                            ?>
                        </ul>
                    </div>

                    <div class="col-lg-12">
                        <div class="price-sec">
                            <div class="price-br">
                                <input type="number" min="0" id="min-input" name="price1" placeholder="Min Price">
                                <i class="la la-dollar"></i>
                            </div>
                            <span>To</span>
                            <div class="price-br">
                                <input type="number" min="0" id="max-input" name="price2" placeholder="Max Price">
                                <i class="la la-dollar"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <textarea name="description" placeholder="Description"></textarea>
                    </div>
                    <div class="col-lg-12">
                        <ul>
                            <li><button class="active" name="add-project" type="submit" value="post">Post</button></li>
                            <!-- <li><a href="#" title="">Cancel</a></li> -->
                        </ul>
                    </div>
                </div>
            </form>
        </div>
        <a href="#" title=""><i class="la la-times-circle-o"></i></a>
    </div>
</div>

<div class="post-popup job_post">
    <div class="post-project">
        <h3>Post a job</h3>
        <div class="post-project-fields">
            <form method="POST" autocomplete="off">
                <input autocomplete="false" name="hidden" type="text" style="display:none;">
                <div class="row">
                    <div class="col-lg-12">
                        <input type="text" name="job-title" placeholder="Title">
                    </div>

                    <div class="col-lg-12">
                        <ul id="allSelectedSkills-2">
                            <li>Selected Skills: </li>
                            <!-- <li class="selectedSkills">PHP<a href="#" title="" class="close-skill"><i class="la la-close"></i></a></li>-->
                            
                        </ul>
                    </div>

                    <div class="col-lg-12">
                        <input type="text" id="searchSkill-2" placeholder="Enter Keyword to Select the Skills">
                        <!-- Hidden input to store skills -->
                        <input type="hidden" id="all-selected-skills-2" name="job-skills" value="">

                        <ul id="listSkill-2" class="project-skills-list">
                            <!-- <li id="no-skill-found">No Skill Found.</li> -->
                            <?php 

                            $select_skills = mysqli_query($con, "select * from skills");
                            while($skill = mysqli_fetch_array($select_skills)){

                                $skl_title = $skill['title'];

                            ?>
                            <li class="skill-name" ><a href="#" title=""><?php echo $skl_title; ?></a></li>
                            <?php 

                            }

                            ?>
                        </ul>
                    </div>

                    <div class="col-lg-6">
                        <div class="price-sec">
                            <div class="price-br">
                                <input type="number" min="0" name="salary" placeholder="Enter Salary(PKR)">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                            <div class="inp-field">
                                <select name="job-type">
                                    <option selected disabled>--Job Type--</option>
                                    <option value="Full Time">Full Time</option>
                                    <option value="Part Time">Part Time</option>
                                </select>
                            </div>
                    </div>
                    <div class="col-lg-12">
                        <textarea name="job-description" placeholder="Description"></textarea>
                    </div>
                    <div class="col-lg-12">
                        <ul>
                            <li><button class="active" name="add-job" type="submit">Post</button></li>
                            <!-- <li><a href="#" title="">Cancel</a></li> -->
                        </ul>
                    </div>
                </div>
            </form>
        </div>
    <a href="#" title=""><i class="la la-times-circle-o"></i></a>
    </div>
</div>