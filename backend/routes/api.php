<?php
// TASK-028 baseline routes. Full controllers in 034-041.
return [
  'GET /api/health' => fn() => ['ok' => true],
  'GET /api/builds' => 'BuildController@index (TODO 034)',
  'POST /api/inquiry' => 'InquiryController@store (TODO 040)',
];
