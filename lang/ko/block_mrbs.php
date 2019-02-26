<?php

// -*-mode: PHP; coding:utf-8;-*-
// $Id: block_mrbs_rlp.php,v 1.1 2009/02/26 07:20:13 arborrow Exp $
// This file contains PHP code that specifies language specific strings
// The default strings come from lang.en, and anything in a locale
// specific file will overwrite the default. This is a Korean file.
//
//
//
//
// This file is PHP code. Treat it as such.
// The charset to use in "Content-type" header
$string["charset"] = "utf-8";

// Used for Moodle
$string['blockname'] = 'Booking system';
$string['accessmrbs_rlp'] = 'Schedule a Resource';

// Used in style.inc
$string["mrbs_rlp"] = "회�?�실 예약 시스템";

// Used in functions.inc
$string["report"] = "보고서";
$string["admin"] = "관리�?";
$string["help"] = "�?�움�?";
$string["search"] = "검색";
$string["not_php3"] = "주�?�: PHP3�?서는 �?�작하지 않습니다.";

// Used in day.php
$string["bookingsfor"] = "Bookings for";
$string["bookingsforpost"] = "�?� 예약입니다.";
$string["areas"] = "지역";
$string["daybefore"] = "�?�전으로";
$string["dayafter"] = "다�?�으로";
$string["gototoday"] = "오늘�?� 예약";
$string["goto"] = "바로가기";
$string["highlight_line"] = "Highlight this line";
$string["click_to_reserve"] = "Click on the cell to make a reservation.";

// Used in trailer.inc
$string["viewday"] = "�?� 단위";
$string["viewweek"] = "주 단위";
$string["viewmonth"] = "월 단위";
$string["ppreview"] = "�?�쇄용 미리보기";

// Used in edit_entry.php
$string["addentry"] = "예약 등�?";
$string["editentry"] = "예약 수정";
$string["editseries"] = "예약(Series) 수정";
$string["namebooker"] = "예약�?명";
$string["fulldescription"] = "�?세정보(�?��?,내부/외부회�?� 등)";
$string["date"] = "날짜";
$string["start_date"] = "시작�?�";
$string["end_date"] = "종료�?�";
$string["time"] = "시간";
$string["period"] = "기간";
$string["duration"] = "회�?� 시간";
$string["seconds"] = "초";
$string["minutes"] = "분";
$string["hours"] = "시간";
$string["days"] = "�?�";
$string["weeks"] = "주";
$string["years"] = "년";
$string["periods"] = "기간";
$string["all_day"] = "하루종�?�";
$string["type"] = "회�?� 종류";
$string["internal"] = "내부회�?�";
$string["external"] = "외부회�?�";
$string["save"] = "보존";
$string["rep_type"] = "반복 타입";
$string["rep_type_0"] = "없�?�";
$string["rep_type_1"] = "�?�간";
$string["rep_type_2"] = "주간";
$string["rep_type_3"] = "월간";
$string["rep_type_4"] = "연간";
$string["rep_type_5"] = "월간, 해당�?�";
$string["rep_type_6"] = "몇주간";
$string["rep_end_date"] = "반복 종료�?�";
$string["rep_rep_day"] = "반복�?�";
$string["rep_for_weekly"] = "(몇 주간용)";
$string["rep_freq"] = "빈�?�";
$string["rep_num_weeks"] = "몇 주";
$string["rep_for_nweekly"] = "(몇 주간용)";
$string["ctrl_click"] = "2개 �?��?�?� 선�?하기 위해서는 Control-Click�?� 사용하세요";
$string["entryid"] = "엔트리 ID ";
$string["repeat_id"] = "반복 ID ";
$string["you_have_not_entered"] = "You have not entered a";
$string["you_have_not_selected"] = "You have not selected a";
$string["valid_room"] = "room.";
$string["valid_time_of_day"] = "valid time of day.";
$string["brief_description"] = "간략 설명";
$string["useful_n-weekly_value"] = "useful n-weekly value.";

// Used in view_entry.php
$string["description"] = "설명";
$string["room"] = "회�?�실명";
$string["createdby"] = "예약�?";
$string["lastupdate"] = "최종 갱신�?�";
$string["deleteentry"] = "예약 취소";
$string["deleteseries"] = "예약(Series) 취소";
$string["confirmdel"] = "예약�?� 취소하시겠습니까?";
$string["returnprev"] = "�?�전 페�?�지로";
$string["invalid_entry_id"] = "무효한 엔트리 ID.";
$string["invalid_series_id"] = "무효한 Serires ID.";

// Used in edit_entry_handler.php
$string["error"] = "�?러";
$string["sched_conflict"] = "스케쥴 중복";
$string["conflict"] = "�?�미 다른 예약�?� �?�어있습니다.";
$string["too_may_entrys"] = "선�?한 옵션�?� 너무 많�?� 엔트리를 작성하게 �?�니다.<br>다른 옵션�?� 선�?해 주세요.";
$string["returncal"] = "달력 화면으로 �?�아�?";
$string["failed_to_acquire"] = "�?��?�타베�?�스 접근�? 실패하였습니다.";

// Authentication stuff
$string["accessdenied"] = "접근�?� 거부�?�";
$string["norights"] = "수정할 수 있는 권한�?� 없습니다.";
$string["please_login"] = "로그�?� 하여 주십시오";
$string["user_name"] = "아�?�디";
$string["user_password"] = "비밀번호";
$string["unknown_user"] = "권한없는 사용�?";
$string["you_are"] = "아�?�디: ";
$string["login"] = "로그�?�";
$string["logoff"] = "로그아웃";

// Authentication database
$string["user_list"] = "사용�? 리스트";
$string["edit_user"] = "사용�? 수정";
$string["delete_user"] = "사용�? 삭제";
//$string["user_name"]         = Use the same as above, for consistency.
//$string["user_password"]     = Use the same as above, for consistency.
$string["user_email"] = "메�?� 주소";
$string["password_twice"] = "비밀번호를 변경하시려면, 새로운 비밀번호를 2회 입력하세요.";
$string["passwords_not_eq"] = "�?러: 비밀번호가 바르지 않습니다.";
$string["add_new_user"] = "사용�? 추가";
$string["rights"] = "권한";
$string["action"] = "�?�작";
$string["user"] = "사용�?";
$string["administrator"] = "관리�?";
$string["unknown"] = "Unknown";
$string["ok"] = "OK";
$string["show_my_entries"] = "Click to display all my upcoming entries";

// Used in search.php
$string["invalid_search"] = "잘못�?� 검색어를 입력했�?�.";
$string["search_results"] = "검색 결과";
$string["nothing_found"] = "검색 결과가 없습니다.";
$string["records"] = "Records ";
$string["through"] = " through ";
$string["of"] = " of ";
$string["previous"] = "�?�전";
$string["next"] = "�?�후";
$string["entry"] = "Entry";
$string["view"] = "View";
$string["advanced_search"] = "�?세 검색";
$string["search_button"] = "검색";
$string["search_for"] = "Search For";
$string["from"] = "From";

// Used in report.php
$string["report_on"] = "회�?��? 관한 보고서 작성";
$string["report_start"] = "시작�?�";
$string["report_end"] = "종료�?�";
$string["match_area"] = "검색할 지역";
$string["match_room"] = "검색할 회�?�실";
$string["match_type"] = "회�?� 타입";
$string["ctrl_click_type"] = "2개 �?��?�?� 선�?할 경우는 Control-Click�?� 사용하세요.";
$string["match_entry"] = "검색할 설명";
$string["match_descr"] = "검색할 �?세 정보";
$string["include"] = "�?�함";
$string["report_only"] = "보고서만";
$string["summary_only"] = "요약정보만";
$string["report_and_summary"] = "보고서 �? 요약정보";
$string["summarize_by"] = "다�?��? �?�해 요약�?�";
$string["sum_by_descrip"] = "간략 설명";
$string["sum_by_creator"] = "작성�?";
$string["entry_found"] = "entry found";
$string["entries_found"] = "entries found";
$string["summary_header"] = "Summary of (Entries) Hours";
$string["summary_header_per"] = "Summary of (Entries) Periods";
$string["total"] = "전체";
$string["submitquery"] = "보고서 실행";
$string["sort_rep"] = "정렬 순서";
$string["sort_rep_time"] = "시작 �?�/시간";
$string["rep_dsp"] = "Display in report";
$string["rep_dsp_dur"] = "기간";
$string["rep_dsp_end"] = "종료 시간";

// Used in week.php
$string["weekbefore"] = "저번 주로";
$string["weekafter"] = "다�?� 주로";
$string["gotothisweek"] = "�?�번 주로";

// Used in month.php
$string["monthbefore"] = "저번 달로";
$string["monthafter"] = "다�?� 달로";
$string["gotothismonth"] = "�?�번 달로";

// Used in {day week month}.php
$string["no_rooms_for_area"] = "등�?�?� 회�?�실�?� 없습니다.";

// Used in admin.php
$string["edit"] = "수정";
$string["delete"] = "삭제";
$string["rooms"] = "회�?�실";
$string["in"] = "in";
$string["noareas"] = "등�?�?� 지역가 없�?�";
$string["addarea"] = "지역 추가";
$string["name"] = "�?�름";
$string["noarea"] = "지역�?� 선�?�?�지 않았�?�";
$string["browserlang"] = "당신�?� 브�?�우저는 다�?� 언어를 사용하�?��? 설정�?�어 있�?�: ";
$string["addroom"] = "회�?�실 추가";
$string["capacity"] = "수용가능 �?��?";
$string["norooms"] = "등�?�?� 회�?�실�?� 없�?�";
$string["administration"] = "지역 �? 회�?�실 관리";

// Used in edit_area_room.php
$string["editarea"] = "지역 수정";
$string["change"] = "수정";
$string["backadmin"] = "�?�아가기";
$string["editroomarea"] = "지역 �?는 회�?�실 수정";
$string["editroom"] = "회�?�실 수정";
$string["update_room_failed"] = "회�?�실 수정 실패: ";
$string["error_room"] = "�?러: 회�?�실  ";
$string["not_found"] = "�?�(가) 발견�?�지 않�?�";
$string["update_area_failed"] = "지역 수정 실패: ";
$string["error_area"] = "�?러: 지역  ";
$string["room_admin_email"] = "회�?�실 관리�? 메�?�주소";
$string["area_admin_email"] = "지역 관리�? 메�?�주소";
$string["invalid_email"] = "잘못�?� 메�?�주소입니다!";

// Used in del.php
$string["deletefollowing"] = "다�?��?� 예약들�?� 삭제�?�니다.";
$string["sure"] = "삭제하시겠습니까?";
$string["YES"] = "예";
$string["NO"] = "아니오";
$string["delarea"] = "지우기 전�? �?� 지역안�? 있는 모든 회�?�실�?� 지워야 합니다.<p>";

// Used in help.php
$string["about_mrbs_rlp"] = "About MRBS";
$string["database"] = "Database";
$string["system"] = "System";
$string["please_contact"] = "�?세한 사항�?� 다�?� 관리�?�?게 연�?�주십시오: ";
$string["for_any_questions"] = " ";

// Used in mysql.inc AND pgsql.inc
$string["failed_connect_db"] = "심�?한 �?러: �?��?�터베�?�스�? 접�?할 수 없습니다.";
