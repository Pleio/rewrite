<?php
?>
//<script>

elgg.provide("elgg.rewrite");

elgg.rewrite.init = function(){
    $(".rewrite-add").click(function() { elgg.rewrite.add(); });

    elgg.rewrite.count = $("[data-source]").length; // do not save header
}

elgg.rewrite.remove = function(self) {
    $(self).closest(".rewrite-row").remove();
}

elgg.rewrite.add = function() {
    $(".rewrite-table .rewrite-row:last").after('<div class="rewrite-row"><div class="rewrite-cell"><input type="text" value="" name="rewrites[' + elgg.rewrite.count + '][source]" class="elgg-input-text"></div><div class="rewrite-cell"><input type="text" value="" name="rewrites[' + elgg.rewrite.count + '][destination]" class="elgg-input-text"></div><div class="rewrite-cell"><a class="rewrite-remove" onClick="elgg.rewrite.remove(this);"><span class="elgg-icon-delete elgg-icon"></span></a></div></div>');
    elgg.rewrite.count += 1;
}


elgg.register_hook_handler("init", "system", elgg.rewrite.init);