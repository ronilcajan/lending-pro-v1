$(document).ready(function(){
    $('#date_started').change(function(){
        var date_started = new Date($(this).val());
        var terms = $('#terms').val();
        var terms2 = $('#terms2').val();
        var maturity;
        if(terms2 == 'day/s'){
            maturity = addDays(date_started,terms)
        }else{
            maturity = addMonths(date_started,terms)
        }
        $('#maturity_date').val(maturity);
    });

    $('#terms').change(function(){
        var terms = $(this).val();
        var terms2 = $('#terms2').val();
        var date_started = new Date($('#date_started').val());
        var maturity;
        if(terms2 == 'day/s'){
            maturity = addDays(date_started,terms)
        }else{
            maturity = addMonths(date_started,terms)
        }

        $('#maturity_date').val(maturity);

        if($('#interest').val() != ''){
            var interest = $('#interest').val();
            var principal = $('#principal').val();
            calculateLoan(interest, principal, terms,terms2);
        }
    });

    $('#terms2').change(function(){
        var terms2 = $(this).val();
        var terms = $('#terms').val();
        var date_started = new Date($('#date_started').val());
        var maturity;

        if(terms2 == 'day/s'){
            maturity = addDays(date_started,terms)
        }else{
            maturity = addMonths(date_started,terms)
        }

        $('#maturity_date').val(maturity);

        if($('#interest').val() != ''){
            var interest = $('#interest').val();
            var principal = $('#principal').val();
            calculateLoan(interest, principal, terms,terms2);
        }
    });


    $('#interest').change(function(){
        var interest = $(this).val();
        var principal = $('#principal').val();
        var terms = $('#terms').val();
        var terms2 = $('#terms2').val();

        calculateLoan(interest, principal, terms,terms2);
    });

    $('#principal').change(function(){
        var interest = $('#interest').val();
        var principal = $(this).val();
        var terms = $('#terms').val();
        var terms2 = $('#terms2').val();

        if($('#interest').val() != ''){
            calculateLoan(interest, principal, terms,terms2);
        }
    });
});
function getLoanTypes(that){
    var type = $(that).val();
    if(type=='Custom'){
        $("#terms").css("pointer-events","auto");
        $("#interest").css("pointer-events","auto");
    }else{
        $.ajax({
            type: "POST",
            url: SITE_URL+"getLoanType",
            dataType: "json",
            data: {type:type},
            success: function(response) {
                console.log(response.msg);
                $('#terms').val(response.msg.terms);
                $('#interest').val(response.msg.interest);
                $('#penalty').val(response.msg.penalty);
                $('#terms2').val(response.msg.terms2);

                $("#terms").css("pointer-events","none");
                $("#terms2").css("pointer-events","none");
                $("#penalty").css("pointer-events","none");
                $("#interest").css("pointer-events","none");

                var principal = $('#principal').val();
                var date_started = new Date($('#date_started').val());
                var maturity;

                if(response.msg.terms2 == 'day/s'){
                    maturity = addDays(date_started,response.msg.terms)
                }else{
                    maturity = addMonths(date_started,response.msg.terms)
                }
               
                $('#maturity_date').val(maturity);
                if(principal==''){
                    principal = 0;
                }

                calculateLoan(response.msg.interest, principal, response.msg.terms,response.msg.terms2);
            }
        });
    }
}

function calculateLoan(interest, principal, terms,terms2){
    if(terms2 == 'day/s'){ // if days one time payment only
        var total_interest = parseFloat(principal * (interest/100)); //calculate interest
        var payments = (parseFloat(principal) + parseFloat(total_interest)) ; // calculate payments
        var total_amount = payments;
    }else{
        var total_interest = parseFloat(principal * (interest/100)) * terms; //calculate interest
        var payments = (parseFloat(principal) + parseFloat(total_interest))  / terms ; // calculate payments
        var total_amount = payments * terms;
    }

    console.log(total_interest,payments,total_amount)
    $('#monthly').val(payments.toFixed(2));
    $('#total_amount').val(total_amount.toFixed(2));
}

function calculateTotal(that){ //calculate total loan 
    var terms = $(that).val();
    var monthly = removeCommas($('#monthlyp').val());
    var penal = $('#penal').val();
    
    if(penal != ''){
        total = monthly * terms + parseFloat(penal);
    }else{
        total = monthly * terms;
    }
    $('#total_payment').val(numberWithCommas(total.toFixed(2)));
}

function numberWithCommas(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}

function removeCommas(str) {
    while (str.search(",") >= 0) {
        str = (str + "").replace(',', '');
    }
    return str;
};

function addMonths(date,terms){
    var date = new Date(date);
    var maturity_date = moment(date);
    maturity_date.add(terms, 'months');
    return maturity_date.toISOString().substr(0,10);
}

function addDays(date, terms) {
    var date = new Date(date);
    var maturity_date = moment(date);
    maturity_date.add(terms, 'days');
    return maturity_date.toISOString().substr(0,10);
}

function payLoan(that){
    id = $(that).attr('data-id');
    amount = $(that).attr('data-amount');
    terms = $(that).attr('data-terms');
    terms2 = $(that).attr('data-terms2');
    skip = $(that).attr('data-skip');
    min = $(that).attr('data-payment');
    loan_id = $(that).attr('data-loan_id');

    if(skip=='hide' || terms2=='day/s'){
        $('#skip').hide();
        $('#amount').css('pointer-events','none')
    }else{
        $('#skip').show();
    }
    $('#amount').prop('min', min);
    $('#p_terms').val(terms);
    $('#p_terms2').val(terms2);
    $('#pment_id').val(id);
    $('#loan_id_m').val(loan_id);
    $('#amount').val(amount);
}
