(function(win,doc){
  'use strict';

  //Captura o elemento HTML marcado com a classe
  let calendarEl = doc.querySelector('.calendar');
  
  //Cria uma instância
  //dayGridMonth - Abre por mês, pode ser semana ou display 
let calendar = new FullCalendar.Calendar(calendarEl, {
    initialView: 'dayGridMonth',
    //businessHours: true, // display business hours

    hiddenDays: [0], // ocultar domingo
        
    validRange: { //descobrir como faz automatico para começar pela data atual, e terminar com a atual + 2 meses
        //start: new Date().tolSOString().substring(0, 10)
        start: '2022-10-18',
        end:  '2022-12-18'
     },

    //headerToolBar - configuração da barra superior. O que vai no início, no meio ou no fim
    headerToolbar: {
        start: 'prev, next, today',
        center: 'title',
        end: 'dayGridMonth, timeGridWeek, timeGridDay'
    },
    
    //buttonText - personaliza o texto dos botões da headerToolBar
    buttonText:{
        today:    'hoje',
        month:    'mês',
        week:     'semana',
        day:      'dia'
    },

    //locale - troca a linguagem
    locale:'pt-br',

   //Captura o evento clique
    dateClick: function(info) {
            if(info.view.type == 'dayGridMonth'){
                calendar.changeView('timeGrid', info.dateStr);
            }else{
                if(info.date.getHours()<8 || info.date.getHours()>18){
                alert('Nosso horário de funcionamento é de 8:00 às 18:00');
                }else{
               win.location.href='eventocadastrarform.php?date='+info.dateStr;
               }
            }
    },
    //Marca eventos no calendário
    events: 'eventoslistar.php',
	eventClick: function(info) {
		win.location.href='https://www.sitequalquer.com.br/evento/${info.event.id}'
	}
    
});
calendar.render();

})(window,document);
