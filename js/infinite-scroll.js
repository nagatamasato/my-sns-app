document.addEventListener('DOMContentLoaded', () => {
    let offset = 0;
    const limit = 10;
    const postsContainer = document.getElementById('posts');
    
    const loadPosts = () => {
        fetch(`index.php?action=getPosts&offset=${offset}&limit=${limit}`)
            .then(response => response.json())
            .then(data => {
                data.posts.forEach(post => {
                    const postElement = document.createElement('div');
                    postElement.classList.add('post');
                    postElement.innerHTML = `
                        <p><strong>${post.name}</strong></p>
                        <p>${post.content}</p>
                        <p><small>${post.created_at}</small></p>
                    `;
                    postsContainer.appendChild(postElement);
                });
                offset += limit;
            });
    };

    window.addEventListener('scroll', () => {
        if (window.innerHeight + window.scrollY >= document.body.offsetHeight) {
            loadPosts();
        }
    });

    loadPosts();
});
