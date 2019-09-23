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
if (isset($row->tid)) {
    $tid = $row->tid;
    // look up the reservation id & term name
    $term_w = entity_metadata_wrapper('taxonomy_term', $tid);
    $reservation_id = $term_w->field_reservation_id->value();
    $name = $term_w->name->value();
    $res_required = $term_w->field_reservation_required->value();
    $output = "tid: $tid, reservation: $reservation_id, name: $name";
    $parts[] = t('<div class="equipment-category">@name</div>',
        array('@name' => $name));
    $parts[] = '<div class="equipment-buttons">';

    // Pick up now button
    $active_class = ($res_required == 'Yes') ? 'disabled' : 'active';
    $parts[] = t('<a href="/services/loans/equipment/@tid/pick-up" class="btn btn-primary equipment-pickup @active" role="button">Pick up now</a>',
        array('@tid' => $tid, '@active' => $active_class));
    
    // Reserve button
    $active_class = ($reservation_id == 0) ? 'disabled' : 'active';
    $parts[] = t('<a href="https://spaces.library.cornell.edu/equipment?lid=94&gid=@gid" class="btn btn-primary equipment-pickup @active" role="button">Reserve</a>',
        array('@gid' => $reservation_id, '@active' => $active_class));

    $parts[] = '</div>';
    $output = implode('', $parts);
}
else {
    drupal_set_message('The field Taxonomy term: Term ID [tid] must be defined.', 'error');
}
?>
<?php print $output; ?>
