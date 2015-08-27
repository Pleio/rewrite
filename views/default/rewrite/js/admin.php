<?php
?>
//<script>

elgg.provide("elgg.rewrite");

elgg.rewrite.init = function(){
    $(".rewrite-add").click(function() { elgg.rewrite.add(); });

    $(".rewrite-table").ready(function() {
        elgg.rewrite.count = $(".rewrite-table .rewrite-row").length - 1 // do not save header;
    });
}

elgg.rewrite.remove = function(self) {
    $(self).closest(".rewrite-row").remove();
}

elgg.rewrite.add = function() {
    elgg.rewrite.count += 1;
    $(".rewrite-table .rewrite-row:last").after('<div class="rewrite-row"><div class="rewrite-cell"><input type="text" value="" name="rewrites[' + elgg.rewrite.count + '][source]" class="elgg-input-text"></div><div class="rewrite-cell"><input type="text" value="" name="rewrites[' + elgg.rewrite.count + '][destination]" class="elgg-input-text"></div><div class="rewrite-cell"><a class="rewrite-remove" onClick="elgg.rewrite.remove(this);"><span class="elgg-icon-delete elgg-icon"></span></a></div></div>');
}


elgg.register_hook_handler("init", "system", elgg.rewrite.init);