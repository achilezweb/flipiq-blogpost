<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
    /* Center the blog posts, postForm, and postsList */
    .container {
        padding-top: 50px;
    }

    #postsList {
        text-align: left;
    }

    #postForm {
        margin-bottom: 20px;
    }

    /* Make the page more responsive */
    @media (max-width: 767px) {
        .container {
            padding-top: 20px;
        }
    }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <h1 class="text-center">Blog Posts</h1>
                <form id="postForm">
                    <div class="form-group">
                        <label for="title">Title:</label>
                        <input type="text" id="title" name="title" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="body">Body:</label>
                        <textarea id="body" name="body" class="form-control" rows="5" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit Post</button>
                </form>
            </div>
        </div>
        <div class="row justify-content-center mt-4">
            <div class="col-lg-8" id="postsList"></div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
        // Function to submit a new post
        $('#postForm').submit(function(event) {
            event.preventDefault(); // Prevent default form submission
            var formData = $(this).serialize(); // Serialize form data
            $.ajax({
                url: '/api/posts',
                method: 'POST',
                data: formData,
                success: function(response) {
                    console.log('Post submitted successfully:', response);
                    $('#postForm')[0].reset(); // Reset form fields
                    fetchPosts(); // Fetch and display updated posts
                },
                error: function(xhr, status, error) {
                    console.error('Error submitting post:', error);
                }
            });
        });

        // Function to fetch and display posts
        function fetchPosts() {
            $.ajax({
                url: '/api/posts',
                method: 'GET',
                success: function(posts) {
                    console.log('Posts retrieved successfully:', posts);
                    displayPosts(posts);
                },
                error: function(xhr, status, error) {
                    console.error('Error fetching posts:', error);
                }
            });
        }

        // Function to display posts in the postsList container
        function displayPosts(posts) {
            var postsList = $('#postsList');
            postsList.empty(); // Clear existing posts
            posts.forEach(function(post) {
                var postElement = $('<div>').addClass('post').html('<h3>' + post.title + '</h3><p>' + post.body + '</p>' + '<hr>');
                postsList.append(postElement); // Append post to postsList container
            });
        }

        // Initial fetch of posts when the page loads
        fetchPosts();
    });
    </script>
</body>
</html>
