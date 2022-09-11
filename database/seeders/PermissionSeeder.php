<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->insert([
            
            'name_en' => 'manage_applications',
            'name_bn' => 'manage_applications',
            'status' => '1',
            'created_by' => '1',

        ]);

        DB::table('permissions')->insert([
            
            'name_en' => 'manage_services',
            'name_bn' => 'manage_services',
            'status' => '1',
            'created_by' => '1',
        ]);

        DB::table('permissions')->insert([
            
            'name_en' => 'manage_offices',
            'name_bn' => 'manage_offices',
            'status' => '1',
            'created_by' => '1',
        ]);
        DB::table('permissions')->insert([
            
            'name_en' => 'user_management',
            'name_bn' => 'user_management',
            'status' => '1',
            'created_by' => '1',
        ]);
        DB::table('permissions')->insert([
            
            'name_en' => 'manage_notice',
            'name_bn' => 'manage_notice',
            'status' => '1',
            'created_by' => '1',
        ]);
        DB::table('permissions')->insert([
            
            'name_en' => 'manage_designation',
            'name_bn' => 'manage_designation',
            'status' => '1',
            'created_by' => '1',
        ]);
        DB::table('permissions')->insert([
            
            'name_en' => 'manage_faqs',
            'name_bn' => 'manage_faqs',
            'status' => '1',
            'created_by' => '1',
        ]);

        DB::table('permissions')->insert([
            
            'name_en' => 'app_settings',
            'name_bn' => 'app_settings',
            'status' => '1',
            'created_by' => '1',
        ]);

        DB::table('permissions')->insert([
            
            'name_en' => 'manage_storage',
            'name_bn' => 'manage_storage',
            'status' => '1',
            'created_by' => '1',
        ]);

        DB::table('permissions')->insert([
            
            'name_en' => 'report',
            'name_bn' => 'report',
            'status' => '1',
            'created_by' => '1',
        ]);

        DB::table('permissions')->insert([
            
            'name_en' => 'settings',
            'name_bn' => 'settings',
            'status' => '1',
            'created_by' => '1',

        ]);

        DB::table('permissions')->insert([
            
            'name_en' => 'create_application',
            'name_bn' => 'create_application',
            'status' => '1',
            'created_by' => '1',
            
        ]);
        DB::table('permissions')->insert([
            
            'name_en' => 'submitted_applications',
            'name_bn' => 'submitted_applications',
            'status' => '1',
            'created_by' => '1',
            
        ]);
        DB::table('permissions')->insert([
            
            'name_en' => 'pending_applications',
            'name_bn' => 'pending_applications',
            'status' => '1',
            'created_by' => '1',
            
        ]);
        DB::table('permissions')->insert([
            
            'name_en' => 'processing_applications',
            'name_bn' => 'processing_applications',
            'status' => '1',
            'created_by' => '1',
            
        ]);
        DB::table('permissions')->insert([
            
            'name_en' => 'approved_applications',
            'name_bn' => 'approved_applications',
            'status' => '1',
            'created_by' => '1',
            
        ]);
        DB::table('permissions')->insert([
            
            'name_en' => 'canceled_applications',
            'name_bn' => 'canceled_applications',
            'status' => '1',
            'created_by' => '1',
            
        ]);


        DB::table('permissions')->insert([
            
            'name_en' => 'application_detail',
            'name_bn' => 'application_detail',
            'status' => '1',
            'created_by' => '1',
            
        ]);
        DB::table('permissions')->insert([
            
            'name_en' => 'application_process_history',
            'name_bn' => 'application_process_history',
            'status' => '1',
            'created_by' => '1',
            
        ]);
        DB::table('permissions')->insert([
            
            'name_en' => 'forward_application',
            'name_bn' => 'forward_application',
            'status' => '1',
            'created_by' => '1',     

        ]);
        DB::table('permissions')->insert([
            
            'name_en' => 'return_application',
            'name_bn' => 'return_application',
            'status' => '1',
            'created_by' => '1',     

        ]);
        DB::table('permissions')->insert([
            
            'name_en' => 'cancel_application',
            'name_bn' => 'cancel_application',
            'status' => '1',
            'created_by' => '1',     

        ]);
        DB::table('permissions')->insert([
            
            'name_en' => 'approve_application',
            'name_bn' => 'approve_application',
            'status' => '1',
            'created_by' => '1',     

        ]);

        DB::table('permissions')->insert([
            
            'name_en' => 'add_service',
            'name_bn' => 'add_service',
            'status' => '1',
            'created_by' => '1',
            
        ]);
        DB::table('permissions')->insert([
            
            'name_en' => 'all_services',
            'name_bn' => 'all_services',
            'status' => '1',
            'created_by' => '1',
            
        ]);
        DB::table('permissions')->insert([
            
            'name_en' => 'view_service',
            'name_bn' => 'view_service',
            'status' => '1',
            'created_by' => '1',
            
        ]);
        DB::table('permissions')->insert([
            
            'name_en' => 'edit_service',
            'name_bn' => 'edit_service',
            'status' => '1',
            'created_by' => '1',
            
        ]);
        DB::table('permissions')->insert([
            
            'name_en' => 'delete_service',
            'name_bn' => 'delete_service',
            'status' => '1',
            'created_by' => '1',
            
        ]);

        DB::table('permissions')->insert([
            
            'name_en' => 'add_service_item',
            'name_bn' => 'add_service_item',
            'status' => '1',
            'created_by' => '1',
            
        ]);
        DB::table('permissions')->insert([
            
            'name_en' => 'all_service_items',
            'name_bn' => 'all_service_items',
            'status' => '1',
            'created_by' => '1',
            
        ]);
        DB::table('permissions')->insert([
            
            'name_en' => 'view_service_item',
            'name_bn' => 'view_service_item',
            'status' => '1',
            'created_by' => '1',
            
        ]);
        DB::table('permissions')->insert([
            
            'name_en' => 'edit_service_item',
            'name_bn' => 'edit_service_item',
            'status' => '1',
            'created_by' => '1',
            
        ]);
        DB::table('permissions')->insert([
            
            'name_en' => 'delete_service_item',
            'name_bn' => 'delete_service_item',
            'status' => '1',
            'created_by' => '1',
            
        ]);

        DB::table('permissions')->insert([
            
            'name_en' => 'add_service_additional_item',
            'name_bn' => 'add_service_additional_item',
            'status' => '1',
            'created_by' => '1',
            
        ]);
        DB::table('permissions')->insert([
            
            'name_en' => 'all_service_additional_items',
            'name_bn' => 'all_service_additional_items',
            'status' => '1',
            'created_by' => '1',
            
        ]);
        DB::table('permissions')->insert([
            
            'name_en' => 'view_service_additional_item',
            'name_bn' => 'view_service_additional_item',
            'status' => '1',
            'created_by' => '1',
            
        ]);
        DB::table('permissions')->insert([
            
            'name_en' => 'edit_service_additional_item',
            'name_bn' => 'edit_service_additional_item',
            'status' => '1',
            'created_by' => '1',
            
        ]);
        DB::table('permissions')->insert([
            
            'name_en' => 'delete_service_additional_item',
            'name_bn' => 'delete_service_additional_item',
            'status' => '1',
            'created_by' => '1',
            
        ]);
        
        DB::table('permissions')->insert([
            
            'name_en' => 'add_office',
            'name_bn' => 'add_office',
            'status' => '1',
            'created_by' => '1',
            
        ]);
        DB::table('permissions')->insert([
            
            'name_en' => 'all_offices',
            'name_bn' => 'all_offices',
            'status' => '1',
            'created_by' => '1',
            
        ]);
        DB::table('permissions')->insert([
            
            'name_en' => 'view_office',
            'name_bn' => 'view_office',
            'status' => '1',
            'created_by' => '1',
            
        ]);
        DB::table('permissions')->insert([
            
            'name_en' => 'edit_office',
            'name_bn' => 'edit_office',
            'status' => '1',
            'created_by' => '1',
            
        ]);
        DB::table('permissions')->insert([
            
            'name_en' => 'delete_office',
            'name_bn' => 'delete_office',
            'status' => '1',
            'created_by' => '1',
            
        ]);

        DB::table('permissions')->insert([
            
            'name_en' => 'add_notice',
            'name_bn' => 'add_notice',
            'status' => '1',
            'created_by' => '1',
            
        ]);
        DB::table('permissions')->insert([
            
            'name_en' => 'all_notices',
            'name_bn' => 'all_notices',
            'status' => '1',
            'created_by' => '1',
            
        ]);
        DB::table('permissions')->insert([
            
            'name_en' => 'edit_notice',
            'name_bn' => 'edit_notice',
            'status' => '1',
            'created_by' => '1',
            
        ]);
        DB::table('permissions')->insert([
            
            'name_en' => 'delete_notice',
            'name_bn' => 'delete_notice',
            'status' => '1',
            'created_by' => '1',
            
        ]);

        DB::table('permissions')->insert([
            
            'name_en' => 'add_designation',
            'name_bn' => 'add_designation',
            'status' => '1',
            'created_by' => '1',
            
        ]);
        DB::table('permissions')->insert([
            
            'name_en' => 'all_designations',
            'name_bn' => 'all_designations',
            'status' => '1',
            'created_by' => '1',
            
        ]);
        DB::table('permissions')->insert([
            
            'name_en' => 'edit_designation',
            'name_bn' => 'edit_designation',
            'status' => '1',
            'created_by' => '1',
            
        ]);
        DB::table('permissions')->insert([
            
            'name_en' => 'delete_designation',
            'name_bn' => 'delete_designation',
            'status' => '1',
            'created_by' => '1',
            
        ]);

        DB::table('permissions')->insert([
            
            'name_en' => 'add_user',
            'name_bn' => 'add_user',
            'status' => '1',
            'created_by' => '1',
            
        ]);
        DB::table('permissions')->insert([
            
            'name_en' => 'all_users',
            'name_bn' => 'all_users',
            'status' => '1',
            'created_by' => '1',
            
        ]);
        DB::table('permissions')->insert([
            
            'name_en' => 'system_users',
            'name_bn' => 'system_users',
            'status' => '1',
            'created_by' => '1',
            
        ]);
        DB::table('permissions')->insert([
            
            'name_en' => 'public_users',
            'name_bn' => 'public_users',
            'status' => '1',
            'created_by' => '1',
            
        ]);
        DB::table('permissions')->insert([
            
            'name_en' => 'subscribers',
            'name_bn' => 'subscribers',
            'status' => '1',
            'created_by' => '1',
            
        ]);
        DB::table('permissions')->insert([
            
            'name_en' => 'view_user',
            'name_bn' => 'view_user',
            'status' => '1',
            'created_by' => '1',
            
        ]);
        DB::table('permissions')->insert([
            
            'name_en' => 'edit_user',
            'name_bn' => 'edit_user',
            'status' => '1',
            'created_by' => '1',
            
        ]);
        DB::table('permissions')->insert([
            
            'name_en' => 'block_user',
            'name_bn' => 'block_user',
            'status' => '1',
            'created_by' => '1',
            
        ]);
        DB::table('permissions')->insert([
            
            'name_en' => 'delete_user',
            'name_bn' => 'delete_user',
            'status' => '1',
            'created_by' => '1',
            
        ]);

        DB::table('permissions')->insert([
            
            'name_en' => 'all_roles',
            'name_bn' => 'all_roles',
            'status' => '1',
            'created_by' => '1',
            
        ]);
        DB::table('permissions')->insert([
            
            'name_en' => 'add_role',
            'name_bn' => 'add_role',
            'status' => '1',
            'created_by' => '1',
            
        ]);
        DB::table('permissions')->insert([
            
            'name_en' => 'edit_role',
            'name_bn' => 'edit_role',
            'status' => '1',
            'created_by' => '1',
            
        ]);
        DB::table('permissions')->insert([
            
            'name_en' => 'delete_role',
            'name_bn' => 'delete_role',
            'status' => '1',
            'created_by' => '1',
            
        ]);

        DB::table('permissions')->insert([
            
            'name_en' => 'all_permissions',
            'name_bn' => 'all_permissions',
            'status' => '1',
            'created_by' => '1',
            
        ]);
        DB::table('permissions')->insert([
            
            'name_en' => 'add_permission',
            'name_bn' => 'add_permission',
            'status' => '1',
            'created_by' => '1',
            
        ]);
        DB::table('permissions')->insert([
            
            'name_en' => 'edit_permission',
            'name_bn' => 'edit_permission',
            'status' => '1',
            'created_by' => '1',
            
        ]);

        DB::table('permissions')->insert([
            
            'name_en' => 'assign_permission_list',
            'name_bn' => 'assign_permission_list',
            'status' => '1',
            'created_by' => '1',
            
        ]);
        DB::table('permissions')->insert([
            
            'name_en' => 'assign_permission',
            'name_bn' => 'assign_permission',
            'status' => '1',
            'created_by' => '1',
            
        ]);
        DB::table('permissions')->insert([
            
            'name_en' => 'edit_assign_permission',
            'name_bn' => 'edit_assign_permission',
            'status' => '1',
            'created_by' => '1',
            
        ]);

        DB::table('permissions')->insert([
            
            'name_en' => 'add_faq',
            'name_bn' => 'add_faq',
            'status' => '1',
            'created_by' => '1',
            
        ]);
        DB::table('permissions')->insert([
            
            'name_en' => 'all_faq',
            'name_bn' => 'all_faq',
            'status' => '1',
            'created_by' => '1',
            
        ]);
        DB::table('permissions')->insert([
            
            'name_en' => 'edit_faq',
            'name_bn' => 'edit_faq',
            'status' => '1',
            'created_by' => '1',
            
        ]);
        DB::table('permissions')->insert([
            
            'name_en' => 'status_faq',
            'name_bn' => 'status_faq',
            'status' => '1',
            'created_by' => '1',            
        ]);

        DB::table('permissions')->insert([
            
            'name_en' => 'add_application_purpose',
            'name_bn' => 'add_application_purpose',
            'status' => '1',
            'created_by' => '1',            
        ]);
        DB::table('permissions')->insert([
            
            'name_en' => 'all_application_purpose',
            'name_bn' => 'all_application_purpose',
            'status' => '1',
            'created_by' => '1',            
        ]);
        DB::table('permissions')->insert([
            
            'name_en' => 'edit_application_purpose',
            'name_bn' => 'edit_application_purpose',
            'status' => '1',
            'created_by' => '1',            
        ]);
        DB::table('permissions')->insert([
            
            'name_en' => 'delete_application_purpose',
            'name_bn' => 'delete_application_purpose',
            'status' => '1',
            'created_by' => '1',            
        ]);

        DB::table('permissions')->insert([
            
            'name_en' => 'add_application_forward_mapping',
            'name_bn' => 'add_application_forward_mapping',
            'status' => '1',
            'created_by' => '1',            
        ]);
        DB::table('permissions')->insert([
            
            'name_en' => 'all_application_forward_mapping',
            'name_bn' => 'all_application_forward_mapping',
            'status' => '1',
            'created_by' => '1',            
        ]);
        DB::table('permissions')->insert([
            
            'name_en' => 'edit_application_forward_mapping',
            'name_bn' => 'edit_application_forward_mapping',
            'status' => '1',
            'created_by' => '1',            
        ]);

        DB::table('permissions')->insert([
            
            'name_en' => 'add_receiving_mode',
            'name_bn' => 'add_receiving_mode',
            'status' => '1',
            'created_by' => '1',            
        ]);
        DB::table('permissions')->insert([
            
            'name_en' => 'all_receiving_mode',
            'name_bn' => 'all_receiving_mode',
            'status' => '1',
            'created_by' => '1',            
        ]);
        DB::table('permissions')->insert([
            
            'name_en' => 'view_receiving_mode',
            'name_bn' => 'view_receiving_mode',
            'status' => '1',
            'created_by' => '1',            
        ]);
        DB::table('permissions')->insert([
            
            'name_en' => 'edit_receiving_mode',
            'name_bn' => 'edit_receiving_mode',
            'status' => '1',
            'created_by' => '1',            
        ]);
        DB::table('permissions')->insert([
            
            'name_en' => 'delete_receiving_mode',
            'name_bn' => 'delete_receiving_mode',
            'status' => '1',
            'created_by' => '1',            
        ]);

        DB::table('permissions')->insert([
            
            'name_en' => 'add_template',
            'name_bn' => 'add_template',
            'status' => '1',
            'created_by' => '1',            
        ]);
        DB::table('permissions')->insert([
            
            'name_en' => 'assessment_template',
            'name_bn' => 'assessment_template',
            'status' => '1',
            'created_by' => '1',            
        ]);
        DB::table('permissions')->insert([
            
            'name_en' => 'edit_template',
            'name_bn' => 'edit_template',
            'status' => '1',
            'created_by' => '1',            
        ]);
        DB::table('permissions')->insert([
            
            'name_en' => 'status_template',
            'name_bn' => 'status_template',
            'status' => '1',
            'created_by' => '1',            
        ]);
        DB::table('permissions')->insert([
            
            'name_en' => 'all_template',
            'name_bn' => 'all_template',
            'status' => '1',
            'created_by' => '1',            
        ]);

        DB::table('permissions')->insert([
            
            'name_en' => 'edit_sms_template',
            'name_bn' => 'edit_sms_template',
            'status' => '1',
            'created_by' => '1',            
        ]);
        DB::table('permissions')->insert([
            
            'name_en' => 'delete_sms_template',
            'name_bn' => 'delete_sms_template',
            'status' => '1',
            'created_by' => '1',            
        ]);
        DB::table('permissions')->insert([
            
            'name_en' => 'all_sms_template',
            'name_bn' => 'all_sms_template',
            'status' => '1',
            'created_by' => '1',            
        ]);
        DB::table('permissions')->insert([
            
            'name_en' => 'add_sms_template',
            'name_bn' => 'add_sms_template',
            'status' => '1',
            'created_by' => '1',            
        ]);

        DB::table('permissions')->insert([
            
            'name_en' => 'all_level',
            'name_bn' => 'all_level',
            'status' => '1',
            'created_by' => '1',            
        ]);
        DB::table('permissions')->insert([
            
            'name_en' => 'add_level',
            'name_bn' => 'add_level',
            'status' => '1',
            'created_by' => '1',            
        ]);
        DB::table('permissions')->insert([
            
            'name_en' => 'edit_level',
            'name_bn' => 'edit_level',
            'status' => '1',
            'created_by' => '1',            
        ]);

        DB::table('permissions')->insert([
            
            'name_en' => 'total_application_count',
            'name_bn' => 'total_application_count',
            'status' => '1',
            'created_by' => '1',            
        ]);
        DB::table('permissions')->insert([
            
            'name_en' => 'total_submitted_application_count',
            'name_bn' => 'total_submitted_application_count',
            'status' => '1',
            'created_by' => '1',            
        ]);
        DB::table('permissions')->insert([
            
            'name_en' => 'total_received_application_count',
            'name_bn' => 'total_received_application_count',
            'status' => '1',
            'created_by' => '1',            
        ]);
        DB::table('permissions')->insert([
            
            'name_en' => 'total_processed_application_count',
            'name_bn' => 'total_processed_application_count',
            'status' => '1',
            'created_by' => '1',            
        ]);
        DB::table('permissions')->insert([
            
            'name_en' => 'total_approved_application_count',
            'name_bn' => 'total_approved_application_count',
            'status' => '1',
            'created_by' => '1',            
        ]);
        DB::table('permissions')->insert([
            
            'name_en' => 'total_rejected_application_count',
            'name_bn' => 'total_rejected_application_count',
            'status' => '1',
            'created_by' => '1',            
        ]);
        DB::table('permissions')->insert([
            
            'name_en' => 'total_role_count',
            'name_bn' => 'total_role_count',
            'status' => '1',
            'created_by' => '1',            
        ]);
        DB::table('permissions')->insert([
            
            'name_en' => 'total_subscriber_count',
            'name_bn' => 'total_subscriber_count',
            'status' => '1',
            'created_by' => '1',            
        ]);
        DB::table('permissions')->insert([
            
            'name_en' => 'total_registered_user_count',
            'name_bn' => 'total_registered_user_count',
            'status' => '1',
            'created_by' => '1',            
        ]);
        DB::table('permissions')->insert([
            
            'name_en' => 'total_system_user_count',
            'name_bn' => 'total_system_user_count',
            'status' => '1',
            'created_by' => '1',            
        ]);
        DB::table('permissions')->insert([
            
            'name_en' => 'total_office_count',
            'name_bn' => 'total_office_count',
            'status' => '1',
            'created_by' => '1',            
        ]);
        DB::table('permissions')->insert([
            
            'name_en' => 'total_service_count',
            'name_bn' => 'total_service_count',
            'status' => '1',
            'created_by' => '1',            
        ]);

        DB::table('permissions')->insert([
            
            'name_en' => 'user_application_count',
            'name_bn' => 'user_application_count',
            'status' => '1',
            'created_by' => '1',            
        ]);
        DB::table('permissions')->insert([
            
            'name_en' => 'user_submitted_application_count',
            'name_bn' => 'user_submitted_application_count',
            'status' => '1',
            'created_by' => '1',            
        ]);
        DB::table('permissions')->insert([
            
            'name_en' => 'user_received_application_count',
            'name_bn' => 'user_received_application_count',
            'status' => '1',
            'created_by' => '1',            
        ]);
        DB::table('permissions')->insert([
            
            'name_en' => 'user_processed_application_count',
            'name_bn' => 'user_processed_application_count',
            'status' => '1',
            'created_by' => '1',            
        ]);
        DB::table('permissions')->insert([
            
            'name_en' => 'user_approved_application_count',
            'name_bn' => 'user_approved_application_count',
            'status' => '1',
            'created_by' => '1',            
        ]);
        DB::table('permissions')->insert([
            
            'name_en' => 'user_rejected_application_count',
            'name_bn' => 'user_rejected_application_count',
            'status' => '1',
            'created_by' => '1',            
        ]);

        DB::table('permissions')->insert([
            
            'name_en' => 'receiver_application_count',
            'name_bn' => 'receiver_application_count',
            'status' => '1',
            'created_by' => '1',            
        ]);

        DB::table('permissions')->insert([
            
            'name_en' => 'application_bar_chart',
            'name_bn' => 'application_bar_chart',
            'status' => '1',
            'created_by' => '1',            
        ]);
        DB::table('permissions')->insert([
            
            'name_en' => 'system_user_login_line_chart',
            'name_bn' => 'system_user_login_line_chart',
            'status' => '1',
            'created_by' => '1',            
        ]);
        DB::table('permissions')->insert([
            
            'name_en' => 'citizen_served_pie_chart',
            'name_bn' => 'citizen_served_pie_chart',
            'status' => '1',
            'created_by' => '1',            
        ]);
        DB::table('permissions')->insert([
            
            'name_en' => 'total_publication_money_earn',
            'name_bn' => 'total_publication_money_earn',
            'status' => '1',
            'created_by' => '1',            
        ]);
        DB::table('permissions')->insert([
            
            'name_en' => 'total_online_money_earn',
            'name_bn' => 'total_online_money_earn',
            'status' => '1',
            'created_by' => '1',            
        ]);
        DB::table('permissions')->insert([
            
            'name_en' => 'total_money_earn',
            'name_bn' => 'total_money_earn',
            'status' => '1',
            'created_by' => '1',            
        ]);

        DB::table('permissions')->insert([
            
            'name_en' => 'manage_requisition',
            'name_bn' => 'manage_requisition',
            'status' => '1',
            'created_by' => '1',            
        ]);
        DB::table('permissions')->insert([
            
            'name_en' => 'all_requisitions',
            'name_bn' => 'all_requisitions',
            'status' => '1',
            'created_by' => '1',            
        ]);
        DB::table('permissions')->insert([
            
            'name_en' => 'pending_requisitions',
            'name_bn' => 'pending_requisitions',
            'status' => '1',
            'created_by' => '1',            
        ]);
        DB::table('permissions')->insert([
            
            'name_en' => 'approved_requisitions',
            'name_bn' => 'approved_requisitions',
            'status' => '1',
            'created_by' => '1',            
        ]);
        DB::table('permissions')->insert([
            
            'name_en' => 'declined_requisitions',
            'name_bn' => 'declined_requisitions',
            'status' => '1',
            'created_by' => '1',            
        ]);
        DB::table('permissions')->insert([
            
            'name_en' => 'create_requisition',
            'name_bn' => 'create_requisition',
            'status' => '1',
            'created_by' => '1',            
        ]);
        DB::table('permissions')->insert([
            
            'name_en' => 'deliver_requisition',
            'name_bn' => 'deliver_requisition',
            'status' => '1',
            'created_by' => '1',            
        ]);
        DB::table('permissions')->insert([
            
            'name_en' => 'decline_requisition',
            'name_bn' => 'decline_requisition',
            'status' => '1',
            'created_by' => '1',            
        ]);
        DB::table('permissions')->insert([
            
            'name_en' => 'approve_requisition',
            'name_bn' => 'approve_requisition',
            'status' => '1',
            'created_by' => '1',            
        ]);
        DB::table('permissions')->insert([
            
            'name_en' => 'delivered_requisitions',
            'name_bn' => 'delivered_requisitions',
            'status' => '1',
            'created_by' => '1',            
        ]);

        // Trainer management
        DB::table('permissions')->insert([
            'name_en' => 'manage_trainer',
            'name_bn' => 'manage_trainer',
            'status' => '1',
            'created_by' => '1',
        ]);
        DB::table('permissions')->insert([
            'name_en' => 'add_trainer',
            'name_bn' => 'add_trainer',
            'status' => '1',
            'created_by' => '1',
        ]);
        DB::table('permissions')->insert([
            'name_en' => 'all_trainer',
            'name_bn' => 'all_trainer',
            'status' => '1',
            'created_by' => '1',
        ]);
        DB::table('permissions')->insert([
            'name_en' => 'edit_trainer',
            'name_bn' => 'edit_trainer',
            'status' => '1',
            'created_by' => '1',
        ]);
        DB::table('permissions')->insert([
            'name_en' => 'trainer_status',
            'name_bn' => 'trainer_status',
            'status' => '1',
            'created_by' => '1',
        ]);

        DB::table('permissions')->insert([
            
            'name_en' => 'manage_department',
            'name_bn' => 'manage_department',
            'status' => '1',
            'created_by' => '1',            
        ]);
        DB::table('permissions')->insert([
            
            'name_en' => 'all_department',
            'name_bn' => 'all_department',
            'status' => '1',
            'created_by' => '1',            
        ]);
        DB::table('permissions')->insert([
            
            'name_en' => 'add_department',
            'name_bn' => 'add_department',
            'status' => '1',
            'created_by' => '1',            
        ]);
        DB::table('permissions')->insert([
            
            'name_en' => 'view_department',
            'name_bn' => 'view_department',
            'status' => '1',
            'created_by' => '1',            
        ]);
        DB::table('permissions')->insert([
            
            'name_en' => 'edit_department',
            'name_bn' => 'edit_department',
            'status' => '1',
            'created_by' => '1',            
        ]);
        DB::table('permissions')->insert([
            
            'name_en' => 'delete_department',
            'name_bn' => 'delete_department',
            'status' => '1',
            'created_by' => '1',            
        ]);

        DB::table('permissions')->insert([
            
            'name_en' => 'manage_fiscal_year',
            'name_bn' => 'manage_fiscal_year',
            'status' => '1',
            'created_by' => '1',            
        ]);
        DB::table('permissions')->insert([
            
            'name_en' => 'all_fiscal_year',
            'name_bn' => 'all_fiscal_year',
            'status' => '1',
            'created_by' => '1',            
        ]);
        DB::table('permissions')->insert([
            
            'name_en' => 'add_fiscal_year',
            'name_bn' => 'add_fiscal_year',
            'status' => '1',
            'created_by' => '1',            
        ]);
        DB::table('permissions')->insert([
            
            'name_en' => 'edit_fiscal_year',
            'name_bn' => 'edit_fiscal_year',
            'status' => '1',
            'created_by' => '1',            
        ]);

        DB::table('permissions')->insert([
            
            'name_en' => 'manage_course',
            'name_bn' => 'manage_course',
            'status' => '1',
            'created_by' => '1',            
        ]);

        DB::table('permissions')->insert([
            
            'name_en' => 'application_discount',
            'name_bn' => 'application_discount',
            'status' => '1',
            'created_by' => '1',            
        ]);

        DB::table('permissions')->insert([
            
            'name_en' => 'manage_calender',
            'name_bn' => 'manage_calender',
            'status' => '1',
            'created_by' => '1',            
        ]);



        /* location permissions */
        DB::table('permissions')->insert([
            
            'name_en' => 'manage_location',
            'name_bn' => 'manage_location',
            'status' => '1',
            'created_by' => '1',            
        ]);

        /* upazila permissions */
        DB::table('permissions')->insert([
            
            'name_en' => 'manage_upazila',
            'name_bn' => 'manage_upazila',
            'status' => '1',
            'created_by' => '1',            
        ]);
        DB::table('permissions')->insert([
            
            'name_en' => 'add_upazila',
            'name_bn' => 'add_upazila',
            'status' => '1',
            'created_by' => '1',            
        ]);
        DB::table('permissions')->insert([
            
            'name_en' => 'all_upazilas',
            'name_bn' => 'all_upazilas',
            'status' => '1',
            'created_by' => '1',            
        ]);
        DB::table('permissions')->insert([
            
            'name_en' => 'edit_upazila',
            'name_bn' => 'edit_upazila',
            'status' => '1',
            'created_by' => '1',            
        ]);
        DB::table('permissions')->insert([
            
            'name_en' => 'view_upazila',
            'name_bn' => 'view_upazila',
            'status' => '1',
            'created_by' => '1',            
        ]);
        DB::table('permissions')->insert([
            
            'name_en' => 'delete_upazila',
            'name_bn' => 'delete_upazila',
            'status' => '1',
            'created_by' => '1',            
        ]);

        /* mouza permissions */
        DB::table('permissions')->insert([
            
            'name_en' => 'manage_mouza',
            'name_bn' => 'manage_mouza',
            'status' => '1',
            'created_by' => '1',            
        ]);
        DB::table('permissions')->insert([
            
            'name_en' => 'add_mouza',
            'name_bn' => 'add_mouza',
            'status' => '1',
            'created_by' => '1',            
        ]);
        DB::table('permissions')->insert([
            
            'name_en' => 'all_mouzas',
            'name_bn' => 'all_mouzas',
            'status' => '1',
            'created_by' => '1',            
        ]);
        DB::table('permissions')->insert([
            
            'name_en' => 'edit_mouza',
            'name_bn' => 'edit_mouza',
            'status' => '1',
            'created_by' => '1',            
        ]);
        DB::table('permissions')->insert([
            
            'name_en' => 'view_mouza',
            'name_bn' => 'view_mouza',
            'status' => '1',
            'created_by' => '1',            
        ]);
        DB::table('permissions')->insert([
            
            'name_en' => 'delete_mouza',
            'name_bn' => 'delete_mouza',
            'status' => '1',
            'created_by' => '1',            
        ]);
        
        // union
        DB::table('permissions')->insert([
            
            'name_en' => 'all_unions',
            'name_bn' => 'all_unions',
            'status' => '1',
            'created_by' => '1',            
        ]);

        DB::table('permissions')->insert([
            
            'name_en' => 'view_union',
            'name_bn' => 'view_union',
            'status' => '1',
            'created_by' => '1',            
        ]);

        DB::table('permissions')->insert([
            
            'name_en' => 'edit_union',
            'name_bn' => 'edit_union',
            'status' => '1',
            'created_by' => '1',            
        ]);

        DB::table('permissions')->insert([
            
            'name_en' => 'delete_union',
            'name_bn' => 'delete_union',
            'status' => '1',
            'created_by' => '1',            
        ]);

        DB::table('permissions')->insert([
            
            'name_en' => 'manage_agriculture',
            'name_bn' => 'manage_agriculture',
            'status' => '1',
            'created_by' => '1',            
        ]);
        DB::table('permissions')->insert([
            
            'name_en' => 'all_agriculture',
            'name_bn' => 'all_agriculture',
            'status' => '1',
            'created_by' => '1',            
        ]);
        DB::table('permissions')->insert([
            
            'name_en' => 'add_agriculture',
            'name_bn' => 'add_agriculture',
            'status' => '1',
            'created_by' => '1',            
        ]);
        DB::table('permissions')->insert([
            
            'name_en' => 'edit_agriculture',
            'name_bn' => 'edit_agriculture',
            'status' => '1',
            'created_by' => '1',            
        ]);   
        
        
        DB::table('permissions')->insert([
            
            'name_en' => 'all_crop',
            'name_bn' => 'all_crop',
            'status' => '1',
            'created_by' => '1',            
        ]); 
        DB::table('permissions')->insert([
            
            'name_en' => 'add_crop',
            'name_bn' => 'add_crop',
            'status' => '1',
            'created_by' => '1',            
        ]); 
        DB::table('permissions')->insert([
            
            'name_en' => 'edit_crop',
            'name_bn' => 'edit_crop',
            'status' => '1',
            'created_by' => '1',            
        ]); 

        DB::table('permissions')->insert([
            
            'name_en' => 'delete_agriculture',
            'name_bn' => 'delete_agriculture',
            'status' => '1',
            'created_by' => '1',            
        ]); 
        DB::table('permissions')->insert([
            
            'name_en' => 'delete_crop',
            'name_bn' => 'delete_crop',
            'status' => '1',
            'created_by' => '1',            
        ]);
        DB::table('permissions')->insert([
            
            'name_en' => 'all_survey',
            'name_bn' => 'all_survey',
            'status' => '1',
            'created_by' => '1',            
        ]);
        DB::table('permissions')->insert([
            
            'name_en' => 'add_survey',
            'name_bn' => 'add_survey',
            'status' => '1',
            'created_by' => '1',            
        ]);
        DB::table('permissions')->insert([
            
            'name_en' => 'edit_survey',
            'name_bn' => 'edit_survey',
            'status' => '1',
            'created_by' => '1',            
        ]);
        DB::table('permissions')->insert([
            
            'name_en' => 'delete_survey',
            'name_bn' => 'delete_survey',
            'status' => '1',
            'created_by' => '1',            
        ]);

        DB::table('permissions')->insert([
            
            'name_en' => 'all_surveyNotification',
            'name_bn' => 'all_surveyNotification',
            'status' => '1',
            'created_by' => '1',            
        ]);

        DB::table('permissions')->insert([
            
            'name_en' => 'add_surveyNotification',
            'name_bn' => 'add_surveyNotification',
            'status' => '1',
            'created_by' => '1',            
        ]);

        DB::table('permissions')->insert([
            
            'name_en' => 'edit_surveyNotification',
            'name_bn' => 'edit_surveyNotification',
            'status' => '1',
            'created_by' => '1',            
        ]);

        DB::table('permissions')->insert([
            
            'name_en' => 'delete_surveyNotification',
            'name_bn' => 'delete_surveyNotification',
            'status' => '1',
            'created_by' => '1',            
        ]);
        DB::table('permissions')->insert([
            
            'name_en' => 'details_surveyNotification',
            'name_bn' => 'details_surveyNotification',
            'status' => '1',
            'created_by' => '1',            
        ]);
        
        DB::table('permissions')->insert([
            
            'name_en' => 'perennialCropForm',
            'name_bn' => 'perennialCropForm',
            'status' => '1',
            'created_by' => '1',            
        ]);
        
        DB::table('permissions')->insert([
            
            'name_en' => 'surveyTofsilForm3Maize',
            'name_bn' => 'surveyTofsilForm3Maize',
            'status' => '1',
            'created_by' => '1',            
        ]);
    }
}
