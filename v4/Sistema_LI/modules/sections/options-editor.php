<?php
include_once 'security.php';
?>
<div class="form-options">
    <div class="options">
    <?php
        if ($_SERVER['REQUEST_URI'] === '/modules/edit_send_one/') {
            echo '<form action="" method="POST">';
            echo '<input type="hidden" name="user_id" value="' . $userid . '">';
            echo '<button id="btnAddOptions" class="btn btn-add icon" name="btn" value="form_addcertification" type="submit">add</button>';
            echo '</form>';
        } else {
            echo '<button id="btnAddOptions" class="btn btn-add btn-disabled icon" name="btn" value="form_addcertification" type="submit" disabled>add</button>';
        }
    ?>

        <!-- <form action="" method="POST">
            <button class="btn btn-disabled icon" name="btn" value="form_coding" type="submit" disabled>code</button>
        </form> -->

        <form action="" method="POST">
            <button class="btn btn-disabled icon" name="btn" value="form_printer" type="submit">print</button>
        </form>

        <button id="btnSearchMobile" class="btn btn-search-mobile icon">search</button>
        <form action="" method="POST">
			<button id="btnExitOptions" class="btn btn-disabled icon" name="btn" value="form_certification" type="submit">close</button>
		</form>
    </div>
    <div class="search">
        <form name="form-search" action="" method="POST">
            <p>
                <input type="text" class="text-search" id="txtSearch" name="search" placeholder="Buscar..." autofocus>
                <button id="btnSearch" class="btn-search icon" type="submit">search</button>
            </p>
        </form>
    </div>
</div>
<script src="/js/controls/options.js"></script>
