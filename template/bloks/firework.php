<div class="accessories-content"> 
    <h3>Праздничный фейерверк</h3>   
    <p>
        Любое мероприятие должно иметь запоминающийся и красочный  финал! 
        Фейерверк - это наилучшее окончание Вашего праздника. Взрывающиеся, разноцветные салюты, создающие в ночном небе фантастические узоры украсят финал торжества, добавят нотки восторга и взрыв эмоций. 
        Искрящиеся фонтаны в виде аллеи, огненные фигуры или звездный дождь  - мы предлагаем различные виды пиротехники любой ценовой категории и на любой вкус.  
        Даже если что-то не удалось на Вашем мероприятии, никто не вспомнит об этих мелочах - в памяти останется только это красочное представление. Поставьте яркую точку - сделайте фейеричное шоу!
    </p> 
    <br/>
</div>

<div class="info-wrapper">
    <?=getFireworkBlock()?>
</div>
<?php 
$scripts .= "
<script type='text/javascript'>
	$(window).load(function() {
/*
        function getContent(count, sort){
            $.ajax({
                url: './jscroll.php',
                dataType: 'json',
                type: 'GET',
                data: { 
                    count: count,
                    sort: sort,
                    table: 'artists'
                },
                success: function(data){
                    if (data.length > 0) {
                        $('.loader').hide();
                        content.append(data);
                        count = $('.info-kind:last-child').attr('data-id');
                        inProcess = false;
                    };
                    $('.loader').hide();
                },

                beforeSend: function(){
                    $('.loader').show();
                }
            }).complete(function() {
                $('.loader').hide();
            });
        }

        var inProcess = false;  
        var content = $('.info-wrapper'),
            loading = '<img src=\'./loading.gif\' alt=\'Loading\' />';

        $(window).scroll(function() {
            count = $('.info-kind:last').attr('data-id');
            sort = $('.sort-select').val();
            if($(window).scrollTop() + $(window).height() >= (content.offset().top + content.height()) && !inProcess){
                inProcess = true;
                getContent(count, sort);
            }
        });
*/

	});
</script>
";
?>