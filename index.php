<?php
/**
 * MyClass File Doc Comment
 *
 * PHP Version 7
 * 
 * @category MyClass
 * @package  MyPackage
 * @author   Michael Kimani <kimanimyke@example.com> 
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     http://www.hashbangcode.com/
 */
require 'db.php'; 
?>
<?php 
    /**
     * Get total number of questions.
     */
    $query = "SELECT * FROM questions";

    //get results
    $results = $mysqli->query($query) or die($mysqli->error.__LINE__);
    $total = $results->num_rows;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PHP Quizzer</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <div class="container">
            <h1>PHP Quizzer</h1>
        </div>
    </header>
    <main>
        <div class="container">
            <h2>Test You PHP Knowledge</h2>
            <p>This is a multiple choice quizz to test your knowledge of PHP.</p>
            <ul>
                <li><strong>Number of Questions</strong> <?php echo $total; ?> </li>
                <li><strong>Type: </strong>Multiple Choices</li>
                <li>
                    <strong>Estimated Time: </strong> 
                    <?php echo $total * .5; ?> Minutes
                </li>
            </ul>
            <a href="question.php?n=1" class="start">Start Quiz</a>
        </div>
    </main>
    <footer>
        <div class="container">
            Copyright &copy; 2018, PHP Quizzer
        </div>
    </footer>
</body>
</html>