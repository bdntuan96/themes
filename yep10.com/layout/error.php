<!-- $error; in product.php -->
<div class="container">
    <div class="row">
        <div class="error">
            <div class="game__content">
            <p>Your search -
                <span>
                    <em><?php echo $error; ?></em>
                </span> - did not match any documents.
            </p>
            <p>Suggestions:</p>
            <ul>
                <li>Make sure that all words are spelled correctly.</li>
                <li>Try different keywords.</li>
                <li>Try more general keywords.</li>
            </ul>
            </div>
        </div>
    </div>
</div>
