<script src="https://kit.fontawesome.com/72e59651da.js" crossorigin="anonymous"></script>
<script src="home/js/jquery-1.11.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
</script>
<script src="home/js/plugins.js"></script>
<script src="home/js/script.js"></script>
<script>
    $(document).ready(function() {
        $('.search-button').on('click', function(e) {
            e.preventDefault();
            $(this).siblings('.search-box').toggle();
            $(this).siblings('.search-box').find('.search-input').focus();
        });
    });
</script>

<script>
    $(document).ready(function() {
        $('#search-input').on('input', function() {
            let query = $(this).val();
            $.ajax({
                url: "{{ route('home') }}",
                method: "GET",
                data: {
                    q: query
                },
                success: function(data) {
                    // Update the product display with the filtered results
                    $('.product-list').html(data);
                }
            });
        });
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.body.addEventListener('submit', function(e) {
            if (e.target.classList.contains('cart-update-form')) {
                e.preventDefault();
                let form = e.target;
                let url = form.getAttribute('data-action');
                let formData = new FormData(form);

                fetch(url, {
                        method: 'POST',
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest',
                            'X-CSRF-TOKEN': formData.get('_token')
                        },
                        body: formData
                    })
                    .then(response => response.json())
                    .then(data => {
                        document.getElementById('cart-table-container').innerHTML = data.html;
                        // Update cart icon badge
                        let badge = document.querySelector('.fa-shopping-cart').parentElement
                            .querySelector('.badge');
                        if (badge) {
                            badge.textContent = data.totalQty;
                            if (data.totalQty > 0) {
                                badge.style.display = '';
                            } else {
                                badge.style.display = 'none';
                            }
                        }
                    });
            }
        });
    });
</script>
