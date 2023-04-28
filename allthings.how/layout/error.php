<!-- $error; in product.php -->
<div class="container">
    <div class="row">
        <div class="error">
            <div class="game__content">
                <h1>Search results</h1>
                <span class="font-display">Your search -
                    <span>
                        <em><?php echo $keywords; ?></em>
                    </span> - did not match any documents.
                </span>
                <br><br>
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