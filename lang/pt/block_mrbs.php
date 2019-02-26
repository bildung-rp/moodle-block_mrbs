<?php

// -*-mode: PHP; coding:utf-8;-*-
// $Id: block_mrbs_rlp.php,v 1.1 2009/02/26 07:20:13 arborrow Exp $
// This file contains PHP code that specifies language specific strings
// The default strings come from lang.en, and anything in a locale
// specific file will overwrite the default. This is a Portuguese file.
//
// Translated by: Lopo Pizarro
//
//
// This file is PHP code. Treat it as such.
// The charset to use in "Content-type" header
$string["charset"] = "utf-8";

// Used for Moodle
$string['blockname'] = 'Horários de salas';
$string['accessmrbs_rlp'] = 'Schedule a Resource';

// Used in style.inc
$string["mrbs_rlp"] = "Horários de salas";

// Used in functions.inc
$string["report"] = "Relatório";
$string["admin"] = "Administração";
$string["help"] = "Ajuda";
$string["search"] = "Pesquisa";
$string["not_php3"] = "AVISO: Isto provavelmente não funciona com php3";

// Used in day.php
$string["bookingsfor"] = "Marcações para";
$string["bookingsforpost"] = ""; // Goes after the date
$string["areas"] = "�?reas";
$string["daybefore"] = "Ir para Dia Anterior";
$string["dayafter"] = "Ir para Dia Seguinte";
$string["gototoday"] = "Ir para hoje";
$string["goto"] = "ir para";
$string["highlight_line"] = "Highlight this line";
$string["click_to_reserve"] = "Click on the cell to make a reservation.";

// Used in trailer.inc
$string["viewday"] = "Ver Dia";
$string["viewweek"] = "Ver Semana";
$string["viewmonth"] = "Ver Mês";
$string["ppreview"] = "Pré-visualizar Inpressão";

// Used in edit_entry.php
$string["addentry"] = "Nova entrada";
$string["editentry"] = "Editar entrada";
$string["editseries"] = "Editar Serie";
$string["namebooker"] = "Descição breve";
$string["fulldescription"] = "Descrição completa:<br>&nbsp;&nbsp;(Numero de Pessoas,<br>&nbsp;&nbsp;Internas/Externas etc)";
$string["date"] = "Data";
$string["start_date"] = "Hora Início";
$string["end_date"] = "Hora Fim";
$string["time"] = "Hora";
$string["period"] = "Period";
$string["duration"] = "Duração";
$string["seconds"] = "segundos";
$string["minutes"] = "minutos";
$string["hours"] = "horas";
$string["days"] = "dias";
$string["weeks"] = "semanas";
$string["years"] = "anos";
$string["periods"] = "periods";
$string["all_day"] = "Todos os dias";
$string["type"] = "Tipo";
$string["internal"] = "Interno";
$string["external"] = "Externo";
$string["save"] = "Gravar";
$string["rep_type"] = "Repetir Tipo";
$string["rep_type_0"] = "Nenhum";
$string["rep_type_1"] = "Diariamente";
$string["rep_type_2"] = "Semanalmente";
$string["rep_type_3"] = "Mensalmente";
$string["rep_type_4"] = "Anualmente";
$string["rep_type_5"] = "Mensalmente, no dia correspoondente";
$string["rep_type_6"] = "n-semanalmente";
$string["rep_end_date"] = "Repetir final de data";
$string["rep_rep_day"] = "Repetir Dia";
$string["rep_for_weekly"] = "(durante (n-)semanalmente)";
$string["rep_freq"] = "Frequência";
$string["rep_num_weeks"] = "Numero de semanas";
$string["rep_for_nweekly"] = "(durante n-semanalmente)";
$string["ctrl_click"] = "Carregue Control-Click para seleccionar mais de uma sala";
$string["entryid"] = "ID de entrada";
$string["repeat_id"] = "Repetir ID ";
$string["you_have_not_entered"] = "Não introduziu uma";
$string["you_have_not_selected"] = "You have not selected a";
$string["valid_room"] = "room.";
$string["valid_time_of_day"] = "hora do dia válida.";
$string["brief_description"] = "Descição breve.";
$string["useful_n-weekly_value"] = "valor n-semanal viável.";

// Used in view_entry.php
$string["description"] = "Descrição";
$string["room"] = "Sala";
$string["createdby"] = "Marcado por";
$string["lastupdate"] = "Última Actualização";
$string["deleteentry"] = "Apagar entrada";
$string["deleteseries"] = "Apagar Series";
$string["confirmdel"] = "Tem a certeza que quer apagar esta entrada?  ";
$string["returnprev"] = "Voltar à Página anterior";
$string["invalid_entry_id"] = "Id inválido.";
$string["invalid_series_id"] = "Invalid series id.";

// Used in edit_entry_handler.php
$string["error"] = "Erro";
$string["sched_conflict"] = "Conflito de marcações";
$string["conflict"] = "A nova marcação entra em confito com as seguintes entrada(s)";
$string["too_may_entrys"] = "A opção selecionada criará demasiadas entradas.<br>Use outras opções por favor!";
$string["returncal"] = "Voltar à vista de Calendário";
$string["failed_to_acquire"] = "A tentativa de adquirir acesso exclusivo à base de dados falhou!";

// Authentication stuff
$string["accessdenied"] = "Acesso Negado";
$string["norights"] = "Não tem permissões para alterar este item.";
$string["please_login"] = "Please log in";
$string["user_name"] = "Name";
$string["user_password"] = "Password";
$string["unknown_user"] = "Unknown user";
$string["you_are"] = "You are";
$string["login"] = "Log in";
$string["logoff"] = "Log Off";

// Authentication database
$string["user_list"] = "User list";
$string["edit_user"] = "Edit user";
$string["delete_user"] = "Delete this user";
//$string["user_name"]         = Use the same as above, for consistency.
//$string["user_password"]     = Use the same as above, for consistency.
$string["user_email"] = "Email address";
$string["password_twice"] = "If you wish to change the password, please type the new password twice";
$string["passwords_not_eq"] = "Error: The passwords do not match.";
$string["add_new_user"] = "Add a new user";
$string["rights"] = "Rights";
$string["action"] = "Action";
$string["user"] = "User";
$string["administrator"] = "Administrator";
$string["unknown"] = "Unknown";
$string["ok"] = "OK";
$string["show_my_entries"] = "Click to display all my upcoming entries";

// Used in search.php
$string["invalid_search"] = "Dados para pesquisa vazios ou inválidos.";
$string["search_results"] = "Resultados da pesquisa para";
$string["nothing_found"] = "Não foram encontrados registos.";
$string["records"] = "Registos ";
$string["through"] = " até ";
$string["of"] = " de ";
$string["previous"] = "Anterior";
$string["next"] = "Próximo";
$string["entry"] = "Entrada";
$string["view"] = "Ver";
$string["advanced_search"] = "Pesquyisa Avançada";
$string["search_button"] = "Perquisar";
$string["search_for"] = "Pesquisar por";
$string["from"] = "De";

// Used in report.php
$string["report_on"] = "Relatório de Disciplinas";
$string["report_start"] = "Relatório de data inicial";
$string["report_end"] = "Relatório de data final";
$string["match_area"] = "Area correspondente";
$string["match_room"] = "Sala correspondente";
$string["match_type"] = "Match type";
$string["ctrl_click_type"] = "Use Control-Click to select more than one type";
$string["match_entry"] = "Breve Descrição correspondente";
$string["match_descr"] = "Descrição completa correspondente";
$string["include"] = "Incluir";
$string["report_only"] = "Apenas relatório";
$string["summary_only"] = "Apenas sumário";
$string["report_and_summary"] = "Relatório e sumário";
$string["summarize_by"] = "Sumário por";
$string["sum_by_descrip"] = "Descrição por";
$string["sum_by_creator"] = "Criador";
$string["entry_found"] = "entrada encontrada";
$string["entries_found"] = "entradas encontradas";
$string["summary_header"] = "Sumário de (entradas) Horas";
$string["summary_header_per"] = "Summary of (Entries) Periods";
$string["total"] = "Total";
$string["submitquery"] = "Correr relatório";
$string["sort_rep"] = "Sort Report by";
$string["sort_rep_time"] = "Start Date/Time";
$string["rep_dsp"] = "Display in report";
$string["rep_dsp_dur"] = "Duration";
$string["rep_dsp_end"] = "End Time";

// Used in week.php
$string["weekbefore"] = "Ir para a semana Anterior";
$string["weekafter"] = "Ir para a semana seguinte";
$string["gotothisweek"] = "Ir para esta semana";

// Used in month.php
$string["monthbefore"] = "Ir para o mês Anterior";
$string["monthafter"] = "Ir para o mês seguinte";
$string["gotothismonth"] = "Ir para este mês";

// Used in {day week month}.php
$string["no_rooms_for_area"] = "Não há salas definidas para esta �?rea";

// Used in admin.php
$string["edit"] = "Editar";
$string["delete"] = "Apagar";
$string["rooms"] = "Salas";
$string["in"] = "em";
$string["noareas"] = "Não há �?reas";
$string["addarea"] = "Acrescentar �?rea";
$string["name"] = "Nome";
$string["noarea"] = "�?rea não selecionada";
$string["browserlang"] = "O seu browser está preparado para use";
$string["addroom"] = "Acrescentar Sala";
$string["capacity"] = "Capacidade";
$string["norooms"] = "Não há salas.";
$string["administration"] = "Administration";

// Used in edit_area_room.php
$string["editarea"] = "Editar �?rea";
$string["change"] = "Mudar";
$string["backadmin"] = "Voltar à administração";
$string["editroomarea"] = "Editar a descrição de �?rea ou Sala";
$string["editroom"] = "Editar Sala";
$string["update_room_failed"] = "Actualizar a sala falhou: ";
$string["error_room"] = "Erro: sala ";
$string["not_found"] = " não encontrado";
$string["update_area_failed"] = "Actualização de área falhou: ";
$string["error_area"] = "Erro: área ";
$string["room_admin_email"] = "Room admin email";
$string["area_admin_email"] = "Area admin email";
$string["invalid_email"] = "Invalid email!";

// Used in del.php
$string["deletefollowing"] = "Esta acção apagará as seguintes Marcações";
$string["sure"] = "Tem a certeza?";
$string["YES"] = "Sim";
$string["NO"] = "Não";
$string["delarea"] = "Tem que apagar todas as salas nesta área antes de a poder apagar<p>";

// Used in help.php
$string["about_mrbs_rlp"] = "Sobre o MRBS";
$string["database"] = "Base de Dados";
$string["system"] = "Sistema";
$string["please_contact"] = "Contacte por favor ";
$string["for_any_questions"] = "for any questions that aren't answered here.";

// Used in mysql.inc AND pgsql.inc
$string["failed_connect_db"] = "Erro: Failha ao ligar à base de dados";
