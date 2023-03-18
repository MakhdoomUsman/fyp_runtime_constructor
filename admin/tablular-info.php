
<script>
	$(document).ready(function(){
        $("#report tbody tr:odd").addClass("odd");
        $("#report tbody tr:not(.odd)").hide();
        $("#report tbody tr:first-child").show();

        $("#report tbody tr.odd td:first-child").click(function(){
            $(this).parent().next("tr").toggle();
            $(this).find(".arrow").toggleClass("up");
        });
    });
</script>

