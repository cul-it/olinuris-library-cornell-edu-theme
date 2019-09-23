<?php

/**
 * @file
 * This template is used to print a single field in a view.
 *
 * It is not actually used in default Views, as this is registered as a theme
 * function which has better performance. For single overrides, the template is
 * perfectly okay.
 *
 * Variables available:
 * - $view: The view object
 * - $field: The field handler object that can process the input
 * - $row: The raw SQL result that can be used
 * - $output: The processed output that will normally be used.
 *
 * When fetching output from the $row, this construct should be used:
 * $data = $row->{$field->field_alias}
 *
 * The above will guarantee that you'll always get the correct data,
 * regardless of any changes in the aliasing that might happen if
 * the view is modified.
 */
if (isset($row->nid)) {
    $nid = $row->nid;
    $node_w = entity_metadata_wrapper('node', $nid);
    $due = $node_w->field_equipment_due_date->value();
    if ($due == 0) {
        // available
        $output = t('<span class="label label-success">Available</span>');
    }
    else {
        // due back
        $output = t('<span class="label label-danger">Checked out</span><br />Due Back @due',
            array('@due' => format_date($due, 'day_time')));
    }
}
else {
    drupal_set_message('The field Node ID: [nid] must be defined.', 'error');
}
?>
<?php print $output; ?>
