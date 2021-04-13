<?php $this->load->view('partials/header') ?>
    <div class="main-container">

        <h1>Add a new course</h1>

        <div class="label">
            <p>Name:</p>
            <p>Description:</p>
        </div>

        <form action="courses/add" method="post">
            <input type="text" name="course" id="">
            <textarea name="description"rows="5"></textarea>
            <input type="submit" value="Add">
        </form>

        <div class="flash">
            <?php echo $this->session->flashdata('add_course_errors');  ?>
        </div>

        <?php echo $this->session->flashdata('add_course_success');     ?>

        <table>
            <thead>
                <tr>
                    <th>Course</th>
                    <th>Description</th>
                    <th>Date Added</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
<?php           for($i=0;$i<count($courses);$i++) {                     ?>
                <tr>
                    <td><?= $courses[$i]['title']       ?></td>
                    <td><?= $courses[$i]['description'] ?></td>
                    <td><?= $courses[$i]['created_at']  ?></td>
                    <td><a href="<?= base_url();?>courses/destroy/<?=$courses[$i]['id']?>">Delete</a></td>
                </tr>
<?php            }                                  ?>
            </tbody>
        </table>
        
    </div>
<?php $this->load->view('partials/footer') ?>