<div id="container">

<h2 id="headline">
    <?php if (!empty($data['headline'])): ?>
        <?php echo htmlspecialchars($data['headline']); ?>
    <?php endif; ?>
</h2>

<div id="main">

    <?php
    
    if (!empty($view) && file_exists($view)) {
    
        include $view;
    
    } else {
    
        echo "<p>No view found.</p>";
    
    }
    
    ?>
</div>
</div>
</div>