<?php
if (!empty($actionActionTitles)) {
	echo '<option value="">' . __('pleaseSelect') . '</option>';
	foreach ($actionActionTitles as $k => $v) {
		echo '<option value="' . $k . '">' . h($v) . '</option>';
	}
} else {
	echo '<option value="0">' . __('noOptionAvailable') . '</option>';
}