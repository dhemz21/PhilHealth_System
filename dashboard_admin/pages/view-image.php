<style>
    .card-body {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
    }
    .gallery-image {
        width: 300px;
        height: 400px;
        margin: 10px;
    }
</style>

<div class="container-fluid">
    <div class="accordion" id="accordionExample">
    <?php
    // Main uploads directory
    $uploadsDirectory = "uploads/";

    // Get a list of directories within the uploads directory
    $directories = array_filter(scandir($uploadsDirectory), function($entry) use ($uploadsDirectory) {
        return is_dir($uploadsDirectory . $entry) && !in_array($entry, ['.', '..']);
    });

    // Counter for accordion item IDs
    $counter = 1;

    // Display the date folders as accordion panels
    foreach ($directories as $directory) {
        echo '<div class="card">';
        echo '<div class="card-header" id="heading' . $counter . '">';
        echo '<h2 class="mb-0">';
        echo '<button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse' . $counter . '" aria-expanded="true" aria-controls="collapse' . $counter . '">';
        echo $directory;
        echo '</button>';
        echo '</h2>';
        echo '</div>';
        echo '<div id="collapse' . $counter . '" class="collapse" aria-labelledby="heading' . $counter . '" data-parent="#accordionExample">';
        echo '<div class="card-body">';
        
        // Get a list of image files within the selected date folder
        $imageFiles = array_diff(scandir($uploadsDirectory . $directory), ['.', '..']);
        
        // Display the images
        foreach ($imageFiles as $imageFile) {
            $imagePath = $uploadsDirectory . $directory . '/' . $imageFile;
            echo '<img src="' . $imagePath . '" alt="' . $imageFile . '" class="gallery-image">';
        }
        
        echo '</div>';
        echo '</div>';
        echo '</div>';
        $counter++;
    }
    ?>
    </div>
</div>
</div>
</div>
