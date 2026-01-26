// Complete Sales Reports Data - All 75 Reports
const reportListData = {
    "categories": [
        {
            "id": "general",
            "name": "General Sales Reports",
            "displayName": "General sales",
            "reports": [
                {
                    "id": "sales-order",
                    "title": "Sales Order Report",
                    "description": "Complete overview of all sales orders with detailed transaction history",
                    "icon": "receipt_long",
                    "tags": ["Core", "Daily"],
                    "link": "https://insidelive.sixorbit.com/?urlq=invoice_reports/sales-order-report/7",
                    "viewCount": 145,
                    "lastViewed": "2026-01-06T10:30:00Z",
                    "isFavorite": false
                },
                {
                    "id": "sales-invoice",
                    "title": "Sales Invoice Report",
                    "description": "Track all invoices, payment status, and billing information",
                    "icon": "description",
                    "tags": ["Finance"],
                    "link": "https://insidelive.sixorbit.com/?urlq=invoice/report/8",
                    "viewCount": 203,
                    "lastViewed": "2026-01-05T15:45:00Z",
                    "isFavorite": true
                },
                {
                    "id": "credit-sales",
                    "title": "Credit Sales Summary",
                    "description": "Monitor credit sales, outstanding amounts, and payment terms",
                    "icon": "description",
                    "tags": ["Finance"],
                    "link": "https://insidelive.sixorbit.com/?urlq=invoice_reports/credit-sales-summary-report/9",
                    "viewCount": 78,
                    "lastViewed": "2026-01-04T09:20:00Z",
                    "isFavorite": false
                },
                {
                    "id": "sales-misc",
                    "title": "Sales Misc Report",
                    "description": "Additional sales data and miscellaneous transactions",
                    "icon": "receipt_long",
                    "tags": [],
                    "link": "https://insidelive.sixorbit.com/?urlq=invoice_reports/sales-misc-report/17",
                    "viewCount": 12,
                    "lastViewed": "2025-12-28T14:10:00Z",
                    "isFavorite": false
                },
                {
                    "id": "sales-reports",
                    "title": "Sales Reports",
                    "description": "General sales reports and detailed sales analysis",
                    "icon": "assessment",
                    "tags": [],
                    "link": "https://insidelive.sixorbit.com/?urlq=invoice_reports/sales-misc-report-details/18",
                    "viewCount": 34,
                    "lastViewed": "2026-01-02T11:15:00Z",
                    "isFavorite": false
                },
                {
                    "id": "pending-invoice",
                    "title": "Pending Sales Invoice",
                    "description": "View all invoices awaiting approval or processing",
                    "icon": "receipt_long",
                    "tags": ["Action Required"],
                    "link": "https://insidelive.sixorbit.com/?urlq=invoice/pending-report/29",
                    "viewCount": 167,
                    "lastViewed": "2026-01-06T08:50:00Z",
                    "isFavorite": true
                },
                {
                    "id": "payment-mode",
                    "title": "Payment Mode Wise Sales",
                    "description": "Breakdown of sales by different payment methods",
                    "icon": "description",
                    "tags": [],
                    "link": "https://insidelive.sixorbit.com/?urlq=invoice_reports/payment-mode-wise-sales-report/31",
                    "viewCount": 45,
                    "lastViewed": "2026-01-03T16:30:00Z",
                    "isFavorite": false
                },
                {
                    "id": "daily-photos",
                    "title": "Daily sales with photos",
                    "description": "Visual record of daily sales activities with photo documentation",
                    "icon": "description",
                    "tags": [],
                    "link": "https://insidelive.sixorbit.com/?urlq=invoice_reports/daily-sales-report-with-photos/33",
                    "viewCount": 8,
                    "lastViewed": "2025-12-20T10:00:00Z",
                    "isFavorite": false
                },
                {
                    "id": "credit-note",
                    "title": "Item wise Credit Note",
                    "description": "Track credit notes issued for individual items",
                    "icon": "description",
                    "tags": [],
                    "link": "https://insidelive.sixorbit.com/?urlq=invoice_reports/credit-note-report/34",
                    "viewCount": 56,
                    "lastViewed": "2026-01-05T13:25:00Z",
                    "isFavorite": false
                },
                {
                    "id": "yoy-comparison",
                    "title": "YOY Sales Comparison",
                    "description": "Year-over-year sales performance analysis",
                    "icon": "description",
                    "tags": ["Trends"],
                    "link": "https://insidelive.sixorbit.com/?urlq=invoice_reports/monthly-sales-reports/35",
                    "viewCount": 89,
                    "lastViewed": "2026-01-01T09:00:00Z",
                    "isFavorite": true
                },
                {
                    "id": "consumer",
                    "title": "Consumer",
                    "description": "Consumer purchase patterns and behavior analysis",
                    "icon": "receipt_long",
                    "tags": [],
                    "link": "https://insidelive.sixorbit.com/?urlq=invoice_reports/consumer-report/42",
                    "viewCount": 23,
                    "lastViewed": "2025-12-15T14:20:00Z",
                    "isFavorite": false
                },
                {
                    "id": "secondary-sales",
                    "title": "Secondary Sales",
                    "description": "Track downstream sales from distributors to retailers",
                    "icon": "description",
                    "tags": [],
                    "link": "https://insidelive.sixorbit.com/?urlq=invoice_reports/secondary-sales-report/43",
                    "viewCount": 15,
                    "lastViewed": "2025-12-22T11:30:00Z",
                    "isFavorite": false
                },
                {
                    "id": "enquiry",
                    "title": "Enquiry",
                    "description": "Customer enquiries and their conversion status",
                    "icon": "description",
                    "tags": [],
                    "link": "https://insidelive.sixorbit.com/?urlq=invoice_reports/enquiry-report/44",
                    "viewCount": 67,
                    "lastViewed": "2026-01-04T15:40:00Z",
                    "isFavorite": false
                },
                {
                    "id": "brand-quotation",
                    "title": "Brand Wise Quotation",
                    "description": "Quotations segmented by brand categories",
                    "icon": "receipt_long",
                    "tags": [],
                    "link": "https://insidelive.sixorbit.com/?urlq=invoice_reports/quotation-report/47",
                    "viewCount": 41,
                    "lastViewed": "2026-01-03T10:15:00Z",
                    "isFavorite": false
                },
                {
                    "id": "brand-order",
                    "title": "Brand Wise Order",
                    "description": "Order distribution across different brands",
                    "icon": "receipt_long",
                    "tags": [],
                    "link": "https://insidelive.sixorbit.com/?urlq=invoice_reports/order-report/48",
                    "viewCount": 52,
                    "lastViewed": "2026-01-04T12:50:00Z",
                    "isFavorite": false
                },
                {
                    "id": "group-closed",
                    "title": "Group Wise Closed Order",
                    "description": "Completed orders categorized by customer groups",
                    "icon": "description",
                    "tags": [],
                    "link": "https://insidelive.sixorbit.com/?urlq=invoice_reports/order-closed-group/52",
                    "viewCount": 28,
                    "lastViewed": "2025-12-30T16:00:00Z",
                    "isFavorite": false
                },
                {
                    "id": "closed-order",
                    "title": "Closed Order",
                    "description": "All fulfilled and closed sales orders",
                    "icon": "description",
                    "tags": [],
                    "link": "https://insidelive.sixorbit.com/?urlq=invoice_reports/order-closed/52",
                    "viewCount": 94,
                    "lastViewed": "2026-01-05T17:20:00Z",
                    "isFavorite": false
                },
                {
                    "id": "item-quotation",
                    "title": "Item Wise Quotation",
                    "description": "Quotation analysis broken down by individual items",
                    "icon": "receipt_long",
                    "tags": [],
                    "link": "https://insidelive.sixorbit.com/?urlq=invoice_reports/item-wise-quotation-report/54",
                    "viewCount": 38,
                    "lastViewed": "2026-01-02T14:30:00Z",
                    "isFavorite": false
                },
                {
                    "id": "invoice-audit",
                    "title": "Invoice Value Audit",
                    "description": "Verify invoice accuracy and value discrepancies",
                    "icon": "description",
                    "tags": ["Audit"],
                    "link": "https://insidelive.sixorbit.com/?urlq=invoice_reports/audit-report",
                    "viewCount": 72,
                    "lastViewed": "2026-01-04T10:00:00Z",
                    "isFavorite": false
                },
                {
                    "id": "credit-audit",
                    "title": "Credit Note Value Audit",
                    "description": "Audit trail for all credit notes and adjustments",
                    "icon": "description",
                    "tags": ["Audit"],
                    "link": "https://insidelive.sixorbit.com/?urlq=invoice_reports/credit-note-audit-report",
                    "viewCount": 31,
                    "lastViewed": "2025-12-29T11:45:00Z",
                    "isFavorite": false
                },
                {
                    "id": "quotation-converted",
                    "title": "Quotation converted",
                    "description": "Track quotations successfully converted to orders",
                    "icon": "description",
                    "tags": [],
                    "link": "https://insidelive.sixorbit.com/?urlq=invoice_reports/quotation-converted-report",
                    "viewCount": 48,
                    "lastViewed": "2026-01-03T09:30:00Z",
                    "isFavorite": false
                },
                {
                    "id": "net-sales",
                    "title": "Net sales",
                    "description": "Net sales figures after deductions and returns",
                    "icon": "receipt_long",
                    "tags": [],
                    "link": "https://insidelive.sixorbit.com/?urlq=invoice_reports/net-sales-report",
                    "viewCount": 61,
                    "lastViewed": "2026-01-05T08:15:00Z",
                    "isFavorite": false
                },
                {
                    "id": "cancelled-item",
                    "title": "Cancelled item",
                    "description": "Track cancelled items and order cancellations",
                    "icon": "description",
                    "tags": [],
                    "link": "https://insidelive.sixorbit.com/?urlq=invoice_reports/cancelled-item-report",
                    "viewCount": 19,
                    "lastViewed": "2025-12-27T13:20:00Z",
                    "isFavorite": false
                },
                {
                    "id": "invoice-customer-log",
                    "title": "Invoice Customer Log",
                    "description": "Detailed log of customer invoice history",
                    "icon": "description",
                    "tags": [],
                    "link": "https://insidelive.sixorbit.com/?urlq=invoice_reports/invoice-customer-log",
                    "viewCount": 25,
                    "lastViewed": "2026-01-01T15:00:00Z",
                    "isFavorite": false
                },
                {
                    "id": "brand-wise-sales",
                    "title": "Brand Wise Sales",
                    "description": "Sales breakdown by brand categories",
                    "icon": "receipt_long",
                    "tags": [],
                    "link": "https://insidelive.sixorbit.com/?urlq=invoice_reports/brand-wise-sales-report",
                    "viewCount": 84,
                    "lastViewed": "2026-01-05T11:30:00Z",
                    "isFavorite": false
                },
                {
                    "id": "daily-loading",
                    "title": "Daily Loading Unloading",
                    "description": "Daily loading and unloading activity tracking",
                    "icon": "description",
                    "tags": [],
                    "link": "https://insidelive.sixorbit.com/?urlq=invoice_reports/daily-loading-unloading",
                    "viewCount": 14,
                    "lastViewed": "2025-12-26T10:30:00Z",
                    "isFavorite": false
                },
                {
                    "id": "attendee-quotation",
                    "title": "Attendee Wise Quotation",
                    "description": "Quotation tracking by event attendees",
                    "icon": "description",
                    "tags": [],
                    "link": "https://insidelive.sixorbit.com/?urlq=invoice_reports/attendee-wise-quotation-report",
                    "viewCount": 7,
                    "lastViewed": "2025-12-18T09:00:00Z",
                    "isFavorite": false
                },
                {
                    "id": "hsn-sales",
                    "title": "HSN Wise Sales Report",
                    "description": "Sales report organized by HSN codes",
                    "icon": "receipt_long",
                    "tags": [],
                    "link": "https://insidelive.sixorbit.com/?urlq=invoice_reports/hsn-wise-sales-report",
                    "viewCount": 22,
                    "lastViewed": "2025-12-31T14:45:00Z",
                    "isFavorite": false
                },
                {
                    "id": "enquiry-to-sales",
                    "title": "Enquiry To Sales Report",
                    "description": "Track conversion from enquiry to sales",
                    "icon": "description",
                    "tags": [],
                    "link": "https://insidelive.sixorbit.com/?urlq=invoice_reports/enquiry-to-sales-report",
                    "viewCount": 43,
                    "lastViewed": "2026-01-03T16:10:00Z",
                    "isFavorite": false
                },
                {
                    "id": "customer-category-discount",
                    "title": "Customer Category Discount",
                    "description": "Discount analysis by customer categories",
                    "icon": "description",
                    "tags": [],
                    "link": "https://insidelive.sixorbit.com/?urlq=invoice_reports/customer-category-discount-report",
                    "viewCount": 17,
                    "lastViewed": "2025-12-24T12:00:00Z",
                    "isFavorite": false
                },
                {
                    "id": "order-trips",
                    "title": "Order Wise Trips",
                    "description": "Trip management and tracking per order",
                    "icon": "description",
                    "tags": [],
                    "link": "https://insidelive.sixorbit.com/?urlq=invoice_reports/order-with-trips",
                    "viewCount": 11,
                    "lastViewed": "2025-12-23T10:20:00Z",
                    "isFavorite": false
                }
            ]
        },
        {
            "id": "comparison",
            "name": "Comparison & Analysis",
            "displayName": "Analysis & comparison",
            "reports": [
                {
                    "id": "monthly-comparison",
                    "title": "Monthly Sales Comparison",
                    "description": "Compare sales performance across different months",
                    "icon": "assessment",
                    "tags": [],
                    "link": "https://insidelive.sixorbit.com/?urlq=invoice_reports/monthly-sales/4",
                    "viewCount": 134,
                    "lastViewed": "2026-01-05T14:20:00Z",
                    "isFavorite": false
                },
                {
                    "id": "brand-comparison",
                    "title": "Brand Monthly Comparison",
                    "description": "Month-over-month brand performance analysis",
                    "icon": "assessment",
                    "tags": [],
                    "link": "https://insidelive.sixorbit.com/?urlq=invoice_reports/monthly-sales/5",
                    "viewCount": 89,
                    "lastViewed": "2026-01-04T11:15:00Z",
                    "isFavorite": false
                },
                {
                    "id": "item-wise",
                    "title": "Item Wise Sales",
                    "description": "Detailed sales breakdown by individual items",
                    "icon": "receipt_long",
                    "tags": [],
                    "link": "https://insidelive.sixorbit.com/?urlq=invoice_reports/sales-item-report/19",
                    "viewCount": 112,
                    "lastViewed": "2026-01-05T09:30:00Z",
                    "isFavorite": false
                },
                {
                    "id": "customer-wise",
                    "title": "Customer Wise Sales",
                    "description": "Sales analysis segmented by customer",
                    "icon": "receipt_long",
                    "tags": [],
                    "link": "https://insidelive.sixorbit.com/?urlq=invoice_reports/customer-sales-item-report/20",
                    "viewCount": 156,
                    "lastViewed": "2026-01-06T13:45:00Z",
                    "isFavorite": false
                },
                {
                    "id": "eco",
                    "title": "ECO",
                    "description": "Engineering change order tracking and analysis",
                    "icon": "description",
                    "tags": [],
                    "link": "https://insidelive.sixorbit.com/?urlq=invoice_reports/eco/21",
                    "viewCount": 33,
                    "lastViewed": "2025-12-28T16:45:00Z",
                    "isFavorite": false
                },
                {
                    "id": "process-details",
                    "title": "Process Details",
                    "description": "Detailed process flow and documentation",
                    "icon": "description",
                    "tags": [],
                    "link": "https://insidelive.sixorbit.com/?urlq=invoice_reports/proces-details/22",
                    "viewCount": 27,
                    "lastViewed": "2025-12-30T13:20:00Z",
                    "isFavorite": false
                },
                {
                    "id": "customer-profitability",
                    "title": "Customer Wise Sales Profitability",
                    "description": "Profitability analysis by customer segments",
                    "icon": "assessment",
                    "tags": ["Profit"],
                    "link": "https://insidelive.sixorbit.com/?urlq=invoice_reports/customer-wise-profitability-report/39",
                    "viewCount": 118,
                    "lastViewed": "2026-01-06T10:15:00Z",
                    "isFavorite": false
                },
                {
                    "id": "item-profitability",
                    "title": "Item Wise Sales Profitability",
                    "description": "Profit margin analysis per product item",
                    "icon": "assessment",
                    "tags": ["Profit"],
                    "link": "https://insidelive.sixorbit.com/?urlq=invoice_reports/item-profitability-report/40",
                    "viewCount": 143,
                    "lastViewed": "2026-01-06T14:30:00Z",
                    "isFavorite": false
                },
                {
                    "id": "fast-moving",
                    "title": "Fast Moving Items",
                    "description": "Identify top-performing products by sales velocity",
                    "icon": "receipt_long",
                    "tags": ["Trending"],
                    "link": "https://insidelive.sixorbit.com/?urlq=invoice_reports/fast-moving-item-report/45",
                    "viewCount": 98,
                    "lastViewed": "2026-01-03T16:00:00Z",
                    "isFavorite": false
                },
                {
                    "id": "slow-moving",
                    "title": "Slow Moving Items",
                    "description": "Track underperforming inventory",
                    "icon": "receipt_long",
                    "tags": [],
                    "link": "https://insidelive.sixorbit.com/?urlq=invoice_reports/slow-moving-item-report/46",
                    "viewCount": 67,
                    "lastViewed": "2026-01-02T14:20:00Z",
                    "isFavorite": false
                },
                {
                    "id": "category-wise-sales",
                    "title": "Category Wise Sales",
                    "description": "Sales performance across product categories",
                    "icon": "receipt_long",
                    "tags": [],
                    "link": "https://insidelive.sixorbit.com/?urlq=invoice_reports/category-wise-sales-report/51",
                    "viewCount": 76,
                    "lastViewed": "2026-01-04T09:45:00Z",
                    "isFavorite": false
                },
                {
                    "id": "monthly-sales-report",
                    "title": "Monthly Sales Report",
                    "description": "Comprehensive monthly sales overview",
                    "icon": "assessment",
                    "tags": [],
                    "link": "https://insidelive.sixorbit.com/?urlq=invoice_reports/monthly-wise-sales-report/55",
                    "viewCount": 101,
                    "lastViewed": "2026-01-05T16:20:00Z",
                    "isFavorite": false
                },
                {
                    "id": "brand-profitability",
                    "title": "Brand Wise Sales Profitability",
                    "description": "Profit analysis segmented by brand",
                    "icon": "assessment",
                    "tags": ["Profit"],
                    "link": "https://insidelive.sixorbit.com/?urlq=invoice_reports/brand-wise-sales-profitability",
                    "viewCount": 87,
                    "lastViewed": "2026-01-03T11:30:00Z",
                    "isFavorite": false
                },
                {
                    "id": "vendor-profitability",
                    "title": "Vendor Wise Sales Profitability",
                    "description": "Profitability tracking by vendor",
                    "icon": "assessment",
                    "tags": ["Profit"],
                    "link": "https://insidelive.sixorbit.com/?urlq=invoice_reports/vendor-wise-sales-profitability",
                    "viewCount": 64,
                    "lastViewed": "2026-01-02T15:45:00Z",
                    "isFavorite": false
                },
                {
                    "id": "sales-purchase-tracking",
                    "title": "Sales Vs Purchase Tracking",
                    "description": "Compare sales against purchase orders",
                    "icon": "assessment",
                    "tags": [],
                    "link": "https://insidelive.sixorbit.com/?urlq=invoice_reports/sales-purchase-tracking",
                    "viewCount": 52,
                    "lastViewed": "2026-01-01T10:20:00Z",
                    "isFavorite": false
                },
                {
                    "id": "order-processing-time",
                    "title": "Sales Order Processing Time",
                    "description": "Track time taken from order to fulfillment",
                    "icon": "description",
                    "tags": [],
                    "link": "https://insidelive.sixorbit.com/?urlq=invoice_reports/sales-order-service-level",
                    "viewCount": 39,
                    "lastViewed": "2025-12-29T14:30:00Z",
                    "isFavorite": false
                },
                {
                    "id": "monthly-brand-sales",
                    "title": "Monthly Brandwise Sales Report",
                    "description": "Monthly breakdown of sales by brand",
                    "icon": "assessment",
                    "tags": [],
                    "link": "https://insidelive.sixorbit.com/?urlq=invoice_reports/monthly-brand-wise-sales-report",
                    "viewCount": 73,
                    "lastViewed": "2026-01-04T16:00:00Z",
                    "isFavorite": false
                },
                {
                    "id": "monthly-influencer-sales",
                    "title": "Monthly Influencerwise Sales Report",
                    "description": "Sales attributed to influencer campaigns monthly",
                    "icon": "assessment",
                    "tags": [],
                    "link": "https://insidelive.sixorbit.com/?urlq=invoice_reports/monthly-influencer-wise-sales-report",
                    "viewCount": 46,
                    "lastViewed": "2026-01-02T09:15:00Z",
                    "isFavorite": false
                },
                {
                    "id": "monthly-attendee-sales",
                    "title": "Monthly Attendeewise Sales Report",
                    "description": "Monthly sales performance by attendee",
                    "icon": "assessment",
                    "tags": [],
                    "link": "https://insidelive.sixorbit.com/?urlq=invoice_reports/monthly-attendee-wise-sales-report",
                    "viewCount": 31,
                    "lastViewed": "2025-12-31T11:00:00Z",
                    "isFavorite": false
                },
                {
                    "id": "pending-sales-order",
                    "title": "Customer Wise Pending Sales Order Report",
                    "description": "Track pending orders by customer",
                    "icon": "receipt_long",
                    "tags": ["Action Required"],
                    "link": "https://insidelive.sixorbit.com/?urlq=invoice_reports/customer-wise-pending-sales-order-report",
                    "viewCount": 108,
                    "lastViewed": "2026-01-06T11:45:00Z",
                    "isFavorite": false
                }
            ]
        },
        {
            "id": "salesperson",
            "name": "Sales Person & Territory Reports",
            "displayName": "Salesperson & territory",
            "reports": [
                {
                    "id": "daily-salesperson",
                    "title": "Daily Sales Person Report",
                    "description": "Daily performance tracking for sales team members",
                    "icon": "assessment",
                    "tags": ["Daily"],
                    "link": "https://insidelive.sixorbit.com/?urlq=invoice_reports/sales-person-report/11",
                    "viewCount": 178,
                    "lastViewed": "2026-01-06T16:30:00Z",
                    "isFavorite": false
                },
                {
                    "id": "salesman-summary",
                    "title": "Salesman Summary",
                    "description": "Comprehensive summary of salesman performance",
                    "icon": "assessment",
                    "tags": [],
                    "link": "https://insidelive.sixorbit.com/?urlq=invoice_reports/salesman-summary/16",
                    "viewCount": 92,
                    "lastViewed": "2026-01-04T10:15:00Z",
                    "isFavorite": false
                },
                {
                    "id": "territory-wise",
                    "title": "Territory Wise Sales",
                    "description": "Sales breakdown by geographical territories",
                    "icon": "assessment",
                    "tags": [],
                    "link": "https://insidelive.sixorbit.com/?urlq=invoice_reports/territory-wise-sales-report/23",
                    "viewCount": 103,
                    "lastViewed": "2026-01-05T11:20:00Z",
                    "isFavorite": false
                },
                {
                    "id": "all-report",
                    "title": "All",
                    "description": "Comprehensive view of all sales activities",
                    "icon": "description",
                    "tags": [],
                    "link": "https://insidelive.sixorbit.com/?urlq=invoice_reports/all-report/24",
                    "viewCount": 54,
                    "lastViewed": "2026-01-01T14:30:00Z",
                    "isFavorite": false
                },
                {
                    "id": "invoice-profitability",
                    "title": "Invoice Profitability",
                    "description": "Profit analysis at invoice level",
                    "icon": "assessment",
                    "tags": ["Profit"],
                    "link": "https://insidelive.sixorbit.com/?urlq=invoice_reports/profitability-report/25",
                    "viewCount": 129,
                    "lastViewed": "2026-01-06T09:20:00Z",
                    "isFavorite": false
                },
                {
                    "id": "commission",
                    "title": "Commission",
                    "description": "Calculate and track sales commissions",
                    "icon": "assessment",
                    "tags": ["Finance"],
                    "link": "https://insidelive.sixorbit.com/?urlq=invoice_reports/commission-report/26",
                    "viewCount": 124,
                    "lastViewed": "2026-01-06T09:45:00Z",
                    "isFavorite": false
                },
                {
                    "id": "salesman-collections",
                    "title": "Salesman wise sales and collections",
                    "description": "Track sales and payment collections by salesman",
                    "icon": "assessment",
                    "tags": [],
                    "link": "https://insidelive.sixorbit.com/?urlq=invoice_reports/salesman-wise-sales-and-collections-report/27",
                    "viewCount": 96,
                    "lastViewed": "2026-01-05T10:30:00Z",
                    "isFavorite": false
                },
                {
                    "id": "salesman-pending-work",
                    "title": "Salesman pending work",
                    "description": "Outstanding tasks and follow-ups per salesman",
                    "icon": "receipt_long",
                    "tags": ["Action Required"],
                    "link": "https://insidelive.sixorbit.com/?urlq=invoice_reports/salesman-pending-work-report/28",
                    "viewCount": 81,
                    "lastViewed": "2026-01-04T15:20:00Z",
                    "isFavorite": false
                },
                {
                    "id": "salesman-wise-sales",
                    "title": "Salesman Wise Sales",
                    "description": "Individual salesman performance metrics",
                    "icon": "assessment",
                    "tags": [],
                    "link": "https://insidelive.sixorbit.com/?urlq=invoice_reports/salesman-wise-sales-report/32",
                    "viewCount": 147,
                    "lastViewed": "2026-01-06T13:15:00Z",
                    "isFavorite": false
                },
                {
                    "id": "salesman-incentive",
                    "title": "Salesman Wise Incentive",
                    "description": "Incentive calculations based on performance",
                    "icon": "assessment",
                    "tags": ["Finance"],
                    "link": "https://insidelive.sixorbit.com/?urlq=invoice_reports/salesman-wise-profit-report/41",
                    "viewCount": 115,
                    "lastViewed": "2026-01-05T16:45:00Z",
                    "isFavorite": false
                },
                {
                    "id": "salesperson-incentive",
                    "title": "Sales Person Incentive",
                    "description": "Comprehensive incentive report for sales team",
                    "icon": "assessment",
                    "tags": ["Finance"],
                    "link": "https://insidelive.sixorbit.com/?urlq=invoice_reports/salesman-wise-incentive-report/49",
                    "viewCount": 122,
                    "lastViewed": "2026-01-06T08:30:00Z",
                    "isFavorite": false
                },
                {
                    "id": "sales-funnel",
                    "title": "Sales Person Funnel Report",
                    "description": "Sales pipeline and conversion funnel analysis",
                    "icon": "assessment",
                    "tags": ["Trends"],
                    "link": "https://insidelive.sixorbit.com/?urlq=invoice_reports/sales-funnel-report",
                    "viewCount": 93,
                    "lastViewed": "2026-01-04T14:00:00Z",
                    "isFavorite": false
                },
                {
                    "id": "influencer-funnel",
                    "title": "Influencer Funnel Report",
                    "description": "Track influencer campaign conversion rates",
                    "icon": "assessment",
                    "tags": [],
                    "link": "https://insidelive.sixorbit.com/?urlq=invoice_reports/influencer-funnel-report",
                    "viewCount": 58,
                    "lastViewed": "2026-01-02T11:45:00Z",
                    "isFavorite": false
                },
                {
                    "id": "salesman-total-work",
                    "title": "Salesman Total Work",
                    "description": "Complete work log and activity summary",
                    "icon": "description",
                    "tags": [],
                    "link": "https://insidelive.sixorbit.com/?urlq=invoice_reports/salesman-total-work-report",
                    "viewCount": 69,
                    "lastViewed": "2026-01-03T13:30:00Z",
                    "isFavorite": false
                },
                {
                    "id": "influencer-commission",
                    "title": "Influencer Wise Commission",
                    "description": "Commission breakdown for influencer partnerships",
                    "icon": "assessment",
                    "tags": ["Finance"],
                    "link": "https://insidelive.sixorbit.com/?urlq=invoice_reports/influencer-wise-commission-report",
                    "viewCount": 74,
                    "lastViewed": "2026-01-04T10:45:00Z",
                    "isFavorite": false
                },
                {
                    "id": "reference-wise-sales",
                    "title": "Reference Wise Sales",
                    "description": "Sales attributed to customer references",
                    "icon": "receipt_long",
                    "tags": [],
                    "link": "https://insidelive.sixorbit.com/?urlq=invoice_reports/reference-wise-sales-report",
                    "viewCount": 47,
                    "lastViewed": "2026-01-01T16:20:00Z",
                    "isFavorite": false
                },
                {
                    "id": "group-sales-analysis",
                    "title": "Group Wise Sales Analysis Report",
                    "description": "Detailed analysis by customer groups",
                    "icon": "assessment",
                    "tags": [],
                    "link": "https://insidelive.sixorbit.com/?urlq=invoice_reports/group-wise-sales-analysis-report",
                    "viewCount": 66,
                    "lastViewed": "2026-01-03T09:45:00Z",
                    "isFavorite": false
                },
                {
                    "id": "category-influencer-sales",
                    "title": "Category Wise Influencer Sales Report",
                    "description": "Influencer performance across product categories",
                    "icon": "assessment",
                    "tags": [],
                    "link": "https://insidelive.sixorbit.com/?urlq=invoice_reports/category-wise-influencer-sales-report",
                    "viewCount": 41,
                    "lastViewed": "2025-12-30T15:30:00Z",
                    "isFavorite": false
                },
                {
                    "id": "attendee-incentive",
                    "title": "Attendee Wise Incentive Report",
                    "description": "Incentive tracking for event attendees",
                    "icon": "assessment",
                    "tags": ["Finance"],
                    "link": "https://insidelive.sixorbit.com/?urlq=invoice_reports/attendee-wise-incentive-report",
                    "viewCount": 35,
                    "lastViewed": "2025-12-28T11:00:00Z",
                    "isFavorite": false
                },
                {
                    "id": "target-incentive",
                    "title": "Target Based Incentive Report",
                    "description": "Incentives calculated against sales targets",
                    "icon": "assessment",
                    "tags": ["Finance"],
                    "link": "https://insidelive.sixorbit.com/?urlq=invoice_reports/target-based-incentive-report",
                    "viewCount": 102,
                    "lastViewed": "2026-01-05T14:15:00Z",
                    "isFavorite": false
                },
                {
                    "id": "monthly-target",
                    "title": "Salesman Wise Monthly Target Report",
                    "description": "Track progress against monthly sales targets",
                    "icon": "assessment",
                    "tags": ["Core"],
                    "link": "https://insidelive.sixorbit.com/?urlq=invoice_reports/salesman-wise-month-target-report",
                    "viewCount": 136,
                    "lastViewed": "2026-01-06T15:00:00Z",
                    "isFavorite": false
                }
            ]
        },
        {
            "id": "leads",
            "name": "Lead Reports",
            "displayName": "Leads",
            "reports": [
                {
                    "id": "lead-report",
                    "title": "Lead",
                    "description": "Comprehensive lead tracking and conversion analysis",
                    "icon": "description",
                    "tags": [],
                    "link": "https://insidelive.sixorbit.com/?urlq=invoice_reports/lead-misc",
                    "viewCount": 87,
                    "lastViewed": "2026-01-03T14:30:00Z",
                    "isFavorite": false
                },
                {
                    "id": "followup",
                    "title": "Followup",
                    "description": "Track follow-up activities and their outcomes",
                    "icon": "description",
                    "tags": [],
                    "link": "https://insidelive.sixorbit.com/?urlq=invoice_reports/followup-misc",
                    "viewCount": 76,
                    "lastViewed": "2026-01-02T16:45:00Z",
                    "isFavorite": false
                },
                {
                    "id": "followup-summary",
                    "title": "Followup Summary",
                    "description": "Summary of all follow-up activities",
                    "icon": "description",
                    "tags": [],
                    "link": "https://insidelive.sixorbit.com/?urlq=invoice_reports/followup-misc-1",
                    "viewCount": 54,
                    "lastViewed": "2025-12-30T11:20:00Z",
                    "isFavorite": false
                },
                {
                    "id": "lead-source",
                    "title": "Lead Source Followup",
                    "description": "Analyze lead sources and their conversion rates",
                    "icon": "description",
                    "tags": ["Trends"],
                    "link": "https://insidelive.sixorbit.com/?urlq=invoice_reports/lead-source-followup",
                    "viewCount": 65,
                    "lastViewed": "2026-01-01T09:00:00Z",
                    "isFavorite": false
                }
            ]
        }
    ]
};
