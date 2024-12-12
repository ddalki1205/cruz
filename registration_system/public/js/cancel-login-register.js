function goBack() {
    // Check if there's a previous page
    if (document.referrer) {
        // Go back to the previous page
        window.history.back();
    } else {
        // If no referrer, redirect to the homepage
        window.location.href = 'index.php';
    }
} 
