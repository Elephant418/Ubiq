Changelog for Ubiq
======


0.4.7: 2014-01-29
--------

* New: Add UArray::valueBy functions


0.4.6: 2013-05-10
--------

* New: Add UArray::renameKey functions
* New: Add UArray::filterBy functions
* New: Add UArray::keyBy functions
* New: Add UArray::groupBy functions


0.4.5: 2013-03-11
-------- 

* New: Add UArray::mergeRecursive functions
* New: Add do prefixed version of the UArray::mergeUnique functions


0.4.4: 2013-03-10
-------- 

* New: Add UArray::isAssociative functions
* Fix: The UArray::deepSelector



0.4.3: 2013-03-10
-------- 

* New: Add UArray::deepSelector functions



0.4.2: 2013-03-09
-------- 

* New: Add UDate functions



0.4.1: 2013-02-26
-------- 

* New: Add php5.3 support



0.4: 2013-02-23
-------- 

* New: Use PSR1 naming standard



0.3.3: 2013-01-22
-------- 

* Fix: New get_offset_index implementation
* Fix: Always use strict comparison
* Fix: Rewrite the let's code part of the readme 



0.3.2: 2013-01-19
-------- 

* New: Add remove_index & do_remove_index method
* New: Add remove_value & do_remove_value method



0.3.1: 2013-01-16
-------- 

* Fix: Allow autoload of the constant \Pixel418\Ubiq::VERSION



0.3.0: 2013-01-16
-------- 

* New: The functions are mutated to static methods to enable composer autoload



0.2.3: 2013-01-15
-------- 

* New: not_start_with and do_not_start_with can take several needles
* New: not_end_with and do_not_end_with can take several needles



0.2.2: 2013-01-15
-------- 

* Fix: Rename the source folder src



0.2.1: 2013-01-15
-------- 

* Fix: empty values did not convert to an empty array



0.2.0: 2013-01-15
-------- 

 * Fix: Rename the starts_with function to is_start_with
 * Fix: Rename the i_starts_with function to is_start_with_insensistive
 * Fix: Rename the must_start_with function to do_start_with
 * New: Add start_with function
 * Fix: Rename the must_not_start_with function to do_not_start_with
 * New: Add not_start_with function
 * Fix: Rename the ends_with function to is_end_with
 * New: Add end_with function
 * Fix: Rename the i_ends_with function to is_end_with_insensistive
 * New: Add not_end_with function
 * Fix: Rename the must_end_with function to do_end_with
 * Fix: Rename the must_not_end_with function to do_not_end_with
 * Fix: Rename the contains function to has
 * Fix: Rename the i_contains function to has_insensistive
 * Fix: Rename the must_have_no_accent function to do_strip_accent
 * Fix: Rename the must_have_no_special_char function to do_strip_special_char
 * Fix: Rename the cut_before function to do_substr_before & inversion between return and reference modification
 * Fix: Rename the cut_before_last function to do_substr_before_last & inversion between return and reference modification
 * Fix: Rename the cut_after function to do_substr_after & inversion between return and reference modification
 * Fix: Rename the cut_after_last function to do_substr_after_last & inversion between return and reference modification
 * Fix: Rename the must_be_array to do_convert_to_array
 * New: Add convert_to_array function
 * Fix: Rename the must_be_class function to do_convert_to_class
 * New: Add convert_to_class function
 * Fix: Rename the must_be_valid_schema function to do_apply_schema
 * New: Add apply_schema function
 * New: Add is_match_schema function



0.1.4: 2013-01-14
-------- 

 * New: Add a must_have_no_accent function
 * New: Add a must_have_no_special_char function
 * Fix: Rename the must_starts_with function to do_start_with
 * Fix: Rename the must_not_starts_with function to must_not_start_with
 * Fix: Rename the must_ends_with function to must_end_with
 * Fix: Rename the must_not_ends_with function to must_not_end_with

[&uarr; top](#readme)