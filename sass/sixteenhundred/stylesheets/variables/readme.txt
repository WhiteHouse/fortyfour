base_variables is designed to hold base settings that the rest of the framework
relies on.  They are grouped together so that they can be imported via
sixteenhundred_variables independently of the rest of the framework.  This
encapsulation is designed to allow framework users to override the variables
BEFORE they are used to build ANY CSS.