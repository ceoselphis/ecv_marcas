<?php

function connect_db()
{
    
}

// Function to get the latest Chrome User Agent string
function getLatestChromeUserAgent() {
  $userAgentUrl = "https://www.whatismybrowser.com/"; // Replace with a reliable User Agent detection service URL
  $ch = curl_init($userAgentUrl);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/VERSION Safari/537.36"); // Set a generic User Agent for the request
  $data = curl_exec($ch);
  curl_close($ch);

  // Parse the data to extract Chrome User Agent
  preg_match('/Chrome\/([0-9]+\.[0-9]+\.[0-9]+)/', $data, $matches);
  if (isset($matches[1])) {
    return "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/" . $matches[1] . " Safari/537.36";
  } else {
    return "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/LATEST Safari/537.36"; // Fallback for cases where version can't be extracted
  }
}

// Get the image URL from user input (replace with your logic to get the URL)
$imageUrl = $_GET['imageUrl']; // Example: Assuming the URL is passed as a query string parameter

// Get the latest Chrome User Agent
$userAgent = getLatestChromeUserAgent();

// Initialize curl
$ch = curl_init($imageUrl);

// Set options
curl_setopt($ch, CURLOPT_USERAGENT, $userAgent);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Get the image content instead of outputting it directly

// Download the image
$imageData = curl_exec($ch);

// Check for errors
if (curl_errno($ch)) {
  echo "Error downloading image: " . curl_error($ch);
  exit;
}

// Close curl session
curl_close($ch);

// Get the image extension from the content type header (optional)
$contentType = curl_getinfo($ch, CURLINFO_CONTENT_TYPE);
$extension = explode("/", $contentType)[1] ?? ""; // Fallback to empty string if not found

// Generate a unique filename (optional)
$filename = uniqid() . "." . $extension;

// Save the image (replace with your desired save location)
file_put_contents("images/" . $filename, $imageData);

echo "Image downloaded successfully: " . $filename;

?>