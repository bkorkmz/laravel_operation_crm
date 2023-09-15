



var answers = JSON.parse(sessionStorage.getItem('answers')) || [];
var letters = genCharArray('A', 'Z');

function genCharArray(charA, charZ) {
    var a = [],
        i = charA.charCodeAt(0),
        j = charZ.charCodeAt(0);
    for (; i <= j; ++i) {
        a.push(String.fromCharCode(i));
    }
    return a;
}

if (answers && answers.length > 0) {
    // Her bir cevap için bir işlem yapın
    answers.forEach(function(answer, index) {
        // Örnek bir işlem: Her bir cevabı bir div içine ekleyin

        let answerTask =
            `  <tr id="${answer.code}">
                                <td>${letters[index]} </td>  
                                    <td>
                                           
                                              <label class="form-check-label mt-2" for="checkbox_${answer.code}"  > 
                                                <input class="answer_section"  type="radio" name="selectedAnswer" value="${answer.code},${answer.task}"
                                              id="checkbox_${answer.code}" required onclick="(check_section(${answer.code}))">
                                                </label>

                                                <span id="answerDisplay_${answer.code}" style="display: none;"><i class="fas fa-check  text-c-green m-l-25"></i> </span>


                                    </td>
                                    <td>${answer.task}
                                        <input type="hidden" name="answerData[]" value="${answer.code},${answer.task}">
                                    </td>
                                    <td>
                                     <div class="delete-button ">
                                        <a class="btn delete_todo"  onclick="delete_todo('${answer.code}')" >
                                            <i class="fas fa-trash-alt text-c-red" ></i></a>
                                     </div>
                                    </td>
                                </tr>
                            `;
        var answerDiv = $('#task-list').append(answerTask);
    });
}


const randomCode = () => {
    return Math.floor(Math.random() * Date.now())

}



$('button#create-task').on('click', function() {
    let code = randomCode();

    $(".md-form-control").removeClass("md-valid");

    // remove nothing message
    if ('.nothing-message') {
        $('.nothing-message').hide('slide', {
            direction: 'left'
        }, 300)
    };

    // create the new li from the form input
    var task = $('#task-insert').val();
    // Alert if the form in submitted empty
    if (task.length == 0) {
        toastr["error"]('Lütfen cevap alanına bir şeyler yazınız ');
    } else {


        // console.log($('#task-list').children().length);
        let section_number = $('#task-list').children().length
        var newTask =
            `  <tr id="${code}">
                                <td>${letters[section_number]} </td>  
                                    <td>
                                           
                                              <label class="form-check-label mt-2" for="checkbox_${code}"  > 
                                                <input class="answer_section"  type="radio"  name="selectedAnswer" value="${code},${task}"
                                              id="checkbox_${code}" required onclick="(check_section(${code}))">
                                                </label>
                                                <span id="answerDisplay_${code}" style="display: none;"><i class="fas fa-check  text-c-green m-l-25"></i> </span>


                                    </td>
                                    <td>
                                        ${task}
                                        <input type="hidden" name="answerData[]" value=" ${code},${task}">
                                    </td>
                                    <td>
                                     <div class="delete-button ">
                                        <a class="btn delete_todo"  onclick="delete_todo('${code}')" >
                                            <i class="fas fa-trash-alt text-c-red" ></i></a>
                                     </div>
                                    </td>
                                </tr>
                            `;
        addAnswer(code, task);
    }

    $('#task-list').append(newTask);

    // clear form when button is pressed
    $('#task-insert').val('');
    $('#task-insert').focus();


    // makes other controls fade in when first task is created
    $('#controls').fadeIn();
    $('.task-headline').fadeIn();


});

function delete_todo(code) {

    // İlgili cevabın indeksini bulun
    var answerIndexToDelete = -1;
    for (var i = 0; i < answers.length; i++) {

        if (answers[i].code == code) {
            console.log("answers[i].code === code", answers[i].code, code);

            answerIndexToDelete = i;
            break;
        }
    }

    if (answerIndexToDelete !== -1) {
        answers.splice(answerIndexToDelete, 1);

        sessionStorage.setItem('answers', JSON.stringify(answers));
    }


    $("#" + code).remove();
    // console.log(code + " silindi.");
    updateSectionNumber();
};

function check_section(code) {
    // console.log(code);
    // var code = $(this).attr("id");
    var answerDisplayId = "answerDisplay_" + code;
    $("[id^='answerDisplay_']").hide();
    $("#" + answerDisplayId).show();
};


function updateSectionNumber() {
    var taskList = $("#task-list");
    taskList.find("tr").each(function(index) {
        $(this).find("td:first").text(letters[index]);
    });


}



function addAnswer(code, task) {
    var answer = {
        code: code,
        task: task
    };
    answers.push(answer);

    // Cevapları session storage'a kaydedin
    sessionStorage.setItem('answers', JSON.stringify(answers));

}
            