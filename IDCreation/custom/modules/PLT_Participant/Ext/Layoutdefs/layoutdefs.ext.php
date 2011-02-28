<?php 
 //WARNING: The contents of this file are auto-generated


// created: 2010-12-15 00:03:52
$layout_defs["PLT_Participant"]["subpanel_setup"]["plt_participant_plt_participant_consent"] = array (
  'order' => 100,
  'module' => 'PLT_Participant_Consent',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_PLT_PARTICIPANT_PLT_PARTICIPANT_CONSENT_FROM_PLT_PARTICIPANT_CONSENT_TITLE',
  'get_subpanel_data' => 'plt_participant_plt_participant_consent',
  'top_buttons' => 
  array (
    0 => 
    array (
      'widget_class' => 'SubPanelTopButtonQuickCreate',
    ),
    1 => 
    array (
      'widget_class' => 'SubPanelTopSelectButton',
      'mode' => 'MultiSelect',
    ),
  ),
);


// created: 2010-12-15 00:03:52
$layout_defs["PLT_Participant"]["subpanel_setup"]["plt_participant_plt_participant_visit_consent"] = array (
  'order' => 100,
  'module' => 'PLT_PARTICIPANT_VISIT_CONSENT',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_PLT_PARTICIPANT_PLT_PARTICIPANT_VISIT_CONSENT_FROM_PLT_PARTICIPANT_VISIT_CONSENT_TITLE',
  'get_subpanel_data' => 'plt_participant_plt_participant_visit_consent',
  'top_buttons' => 
  array (
    0 => 
    array (
      'widget_class' => 'SubPanelTopButtonQuickCreate',
    ),
    1 => 
    array (
      'widget_class' => 'SubPanelTopSelectButton',
      'mode' => 'MultiSelect',
    ),
  ),
);


// created: 2010-12-15 00:03:52
$layout_defs["PLT_Participant"]["subpanel_setup"]["plt_participant_plt_ppg_status_history"] = array (
  'order' => 100,
  'module' => 'PLT_PPG_STATUS_HISTORY',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_PLT_PARTICIPANT_PLT_PPG_STATUS_HISTORY_FROM_PLT_PPG_STATUS_HISTORY_TITLE',
  'get_subpanel_data' => 'plt_participant_plt_ppg_status_history',
  'top_buttons' => 
  array (
    0 => 
    array (
      'widget_class' => 'SubPanelTopButtonQuickCreate',
    ),
    1 => 
    array (
      'widget_class' => 'SubPanelTopSelectButton',
      'mode' => 'MultiSelect',
    ),
  ),
);


// created: 2010-12-15 00:03:52
$layout_defs["PLT_Participant"]["subpanel_setup"]["plt_participant_plt_ppg_details"] = array (
  'order' => 100,
  'module' => 'PLT_PPG_DETAILS',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_PLT_PARTICIPANT_PLT_PPG_DETAILS_FROM_PLT_PPG_DETAILS_TITLE',
  'get_subpanel_data' => 'plt_participant_plt_ppg_details',
  'top_buttons' => 
  array (
    0 => 
    array (
      'widget_class' => 'SubPanelTopButtonQuickCreate',
    ),
    1 => 
    array (
      'widget_class' => 'SubPanelTopSelectButton',
      'mode' => 'MultiSelect',
    ),
  ),
);


// created: 2010-12-15 00:03:52
$layout_defs["PLT_Participant"]["subpanel_setup"]["activities"] = array (
  'order' => 10,
  'sort_order' => 'desc',
  'sort_by' => 'date_start',
  'title_key' => 'LBL_ACTIVITIES_SUBPANEL_TITLE',
  'type' => 'collection',
  'subpanel_name' => 'activities',
  'module' => 'Activities',
  'top_buttons' => 
  array (
    0 => 
    array (
      'widget_class' => 'SubPanelTopCreateTaskButton',
    ),
    1 => 
    array (
      'widget_class' => 'SubPanelTopScheduleMeetingButton',
    ),
    2 => 
    array (
      'widget_class' => 'SubPanelTopScheduleCallButton',
    ),
    3 => 
    array (
      'widget_class' => 'SubPanelTopComposeEmailButton',
    ),
  ),
  'collection_list' => 
  array (
    'meetings' => 
    array (
      'module' => 'Meetings',
      'subpanel_name' => 'ForActivities',
      'get_subpanel_data' => 'plt_participant_activities_meetings',
    ),
    'tasks' => 
    array (
      'module' => 'Tasks',
      'subpanel_name' => 'ForActivities',
      'get_subpanel_data' => 'plt_participant_activities_tasks',
    ),
    'calls' => 
    array (
      'module' => 'Calls',
      'subpanel_name' => 'ForActivities',
      'get_subpanel_data' => 'plt_participant_activities_calls',
    ),
  ),
  'get_subpanel_data' => 'activities',
);


// created: 2010-12-15 00:03:52
$layout_defs["PLT_Participant"]["subpanel_setup"]["history"] = array (
  'order' => 20,
  'sort_order' => 'desc',
  'sort_by' => 'date_modified',
  'title_key' => 'LBL_HISTORY',
  'type' => 'collection',
  'subpanel_name' => 'history',
  'module' => 'History',
  'top_buttons' => 
  array (
    0 => 
    array (
      'widget_class' => 'SubPanelTopCreateNoteButton',
    ),
    1 => 
    array (
      'widget_class' => 'SubPanelTopArchiveEmailButton',
    ),
    2 => 
    array (
      'widget_class' => 'SubPanelTopSummaryButton',
    ),
  ),
  'collection_list' => 
  array (
    'meetings' => 
    array (
      'module' => 'Meetings',
      'subpanel_name' => 'ForHistory',
      'get_subpanel_data' => 'plt_participant_activities_meetings',
    ),
    'tasks' => 
    array (
      'module' => 'Tasks',
      'subpanel_name' => 'ForHistory',
      'get_subpanel_data' => 'plt_participant_activities_tasks',
    ),
    'calls' => 
    array (
      'module' => 'Calls',
      'subpanel_name' => 'ForHistory',
      'get_subpanel_data' => 'plt_participant_activities_calls',
    ),
    'notes' => 
    array (
      'module' => 'Notes',
      'subpanel_name' => 'ForHistory',
      'get_subpanel_data' => 'plt_participant_activities_notes',
    ),
    'emails' => 
    array (
      'module' => 'Emails',
      'subpanel_name' => 'ForHistory',
      'get_subpanel_data' => 'plt_participant_activities_emails',
    ),
  ),
  'get_subpanel_data' => 'history',
);


// created: 2010-12-15 00:03:53
$layout_defs["PLT_Participant"]["subpanel_setup"]["plt_person_plt_participant"] = array (
  'order' => 100,
  'module' => 'PLT_PERSON',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_PLT_PERSON_PLT_PARTICIPANT_FROM_PLT_PERSON_TITLE',
  'get_subpanel_data' => 'plt_person_plt_participant',
  'top_buttons' => 
  array (
    0 => 
    array (
      'widget_class' => 'SubPanelTopButtonQuickCreate',
    ),
    1 => 
    array (
      'widget_class' => 'SubPanelTopSelectButton',
      'mode' => 'MultiSelect',
    ),
  ),
);


?>