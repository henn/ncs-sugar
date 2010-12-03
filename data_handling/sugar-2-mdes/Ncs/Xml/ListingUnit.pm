package Ncs::Xml::ListingUnit;

use strict;
use warnings;
use Ncs::Soap::SoapNcs;
use Ncs::Db::DbDefs;
use Ncs::Op;

use constant LIST_SOURCE_MIN	=> 1;
use constant LIST_SOURCE_MAX	=> 2;

sub new
{
	my ($class, $soap, $is_snapshot) = @_;

	my $self = bless
	{
		_psu_id				=> undef,
		_ssu_id				=> undef,
		_tsu_id				=> undef,
		_list_id			=> undef,
		_list_line			=> undef,
		_list_source		=> undef,
		_list_commnet		=> undef,
		_create_date		=> undef,
		_table_spec_version	=> Ncs::Op::LISTING_UNIT_VERSION,
		_transaction_type	=> (($is_snapshot eq "true") ? 'NA' : 'UP'),
		_sugar_soap			=> $soap,
		_table				=> Ncs::Db::DbDefs::LISTING_UNIT_TABLE,
		_sql				=> 'select ID, LIST_ID, LIST_LINE, LIST_SOURCE, ' .
								'LIST_COMMENT, DATE_FORMAT(create_date, \'%Y-%m-%d\') AS ' .
								'CREATE_DATE from ' . Ncs::Db::DbDefs::LISTING_UNIT_TABLE
	}, $class;

	return $self;
}

sub populate
{
	my ($self, $values) = @_;

	# retrieve sugar listing unit record id
	my $listing_unit_sugar_id = $values->{ID} || '';

	# retrieve psu_id relationship id
	my $rel_id = $self->{_sugar_soap}->get_sugar_relationship_id({module1 => Ncs::Db::DbDefs::LISTING_UNIT_SUGAR_MODULE, 
									id => $listing_unit_sugar_id, 
									module2 => Ncs::Db::DbDefs::PSU_SUGAR_MODULE});
	# retrieve field (psu_id) value
	my $psu_id_field_value = $self->{_sugar_soap}->get_field_value({module => Ncs::Db::DbDefs::PSU_SUGAR_MODULE, 
									id => $rel_id, 
									field => 'psu_id'});
	# retrieve ssu_id relationship id
	$rel_id = $self->{_sugar_soap}->get_sugar_relationship_id({module1 => Ncs::Db::DbDefs::LISTING_UNIT_SUGAR_MODULE, 
									id => $listing_unit_sugar_id, 
									module2 => Ncs::Db::DbDefs::SSU_SUGAR_MODULE});
	# retrieve field (ssu_id) value
	my $ssu_id_field_value = $self->{_sugar_soap}->get_field_value({module => Ncs::Db::DbDefs::SSU_SUGAR_MODULE, 
									id => $rel_id, 
									field => 'ssu_id'});
	# retrieve tsu_id relationship id
	$rel_id = $self->{_sugar_soap}->get_sugar_relationship_id({module1 => Ncs::Db::DbDefs::LISTING_UNIT_SUGAR_MODULE, 
									id => $listing_unit_sugar_id, 
									module2 => Ncs::Db::DbDefs::TSU_SUGAR_MODULE});
	# retrieve field (tsu_id) value
	my $tsu_id_field_value = $self->{_sugar_soap}->get_field_value({module => Ncs::Db::DbDefs::TSU_SUGAR_MODULE, 
									id => $rel_id, 
									field => 'tsu_id'});

	$self->{_psu_id}				= $psu_id_field_value;
	$self->{_ssu_id}				= $ssu_id_field_value;
	$self->{_tsu_id}				= $tsu_id_field_value;
	$self->{_list_id}				= $values->{LIST_ID} || Ncs::Op::UNKNOWN;
	$self->{_list_line}				= $values->{LIST_LINE} || Ncs::Op::UNKNOWN;
	$self->{_list_source}			= $values->{LIST_SOURCE} || Ncs::Op::UNKNOWN;
	$self->{_list_comment}			= $values->{LIST_COMMENT} || '';
	$self->{_create_date}			= $values->{CREATE_DATE} || Ncs::Op::UNKNOWN_DATE;
}

sub validate
{
	my $self = shift;

	return "PSU_ID column exceeds allowed character length" unless ( length($self->{_psu_id}) <= 36 );
	return "SSU_ID column exceeds allowed character length" unless ( length($self->{_ssu_id}) <= 36 );
	return "TSU_ID column exceeds allowed character length" unless ( length($self->{_tsu_id}) <= 36 );
	return "LIST_ID column exceeds allowed character length" unless ( length($self->{_list_id}) <= 36 );
	return "LIST_SOURCE column invalid value" unless ( ($self->{_list_source} >= LIST_SOURCE_MIN && 
																$self->{_list_source} <= LIST_SOURCE_MAX) ||
																$self->{_list_source} == Ncs::Op::UNKNOWN);
	return "LIST_COMMENT column exceeds allowed character length" unless ( length($self->{_list_comment}) <= 8000 );
	return "CREATE_DATE column contains an invalid date format" unless ( $self->{_create_date} =~ /^\d{4}-\d{2}-\d{2}$/ );
	return "TABLE_SPEC_VERSION column exceeds allowed character length" unless ( length($self->{_table_spec_version}) <= 14 );

	return undef;
}

sub print_tag
{
	my $self = shift;

	my $out = sprintf("\t\t<listing_unit>\n");
	$out .= sprintf("\t\t\t<psu_id>%s</psu_id>\n", $self->{_psu_id});
	$out .= sprintf("\t\t\t<ssu_id>%s</ssu_id>\n", $self->{_ssu_id});
	$out .= sprintf("\t\t\t<tsu_id>%s</tsu_id>\n", $self->{_tsu_id});
	$out .= sprintf("\t\t\t<list_id>%s</list_id>\n", $self->{_ssu_id});
	$out .= sprintf("\t\t\t<list_line>%s</list_line>\n", $self->{_list_id});
	$out .= sprintf("\t\t\t<list_source>%d</list_source>\n", $self->{_list_source});
	$out .= sprintf("\t\t\t<list_comment>%s</list_comment>\n", $self->{_list_comment});
	$out .= sprintf("\t\t\t<create_date>%s</create_date>\n", $self->{_create_date});
	$out .= sprintf("\t\t\t<table_spec_version>%s</table_spec_version>\n", $self->{_table_spec_version});
	$out .= sprintf("\t\t\t<transactionType>%s</transactionType>\n", $self->{_transaction_type});
	$out .= sprintf("\t\t</listing_unit>");

	return $out;
}

sub getPsuId			{ my $self = shift; return $self->{_psu_id} || ''; }
sub getSsuId			{ my $self = shift; return $self->{_ssu_id} || ''; }
sub getTsuId			{ my $self = shift; return $self->{_tsu_id} || ''; }
sub getListId			{ my $self = shift; return $self->{_list_id} || ''; }
sub getListLine			{ my $self = shift; return $self->{_list_line} || ''; }
sub getListSource		{ my $self = shift; return $self->{_list_source} || ''; }
sub getListCommnet		{ my $self = shift; return $self->{_list_comment} || ''; }
sub getCreateDate		{ my $self = shift; return $self->{_create_date} || ''; }
sub getTableSpecVersion	{ my $self = shift; return $self->{_table_spec_version} || ''; }
sub getTransactionType	{ my $self = shift; return $self->{_transaction_type} || ''; }
sub getSql				{ my $self = shift; return $self->{_sql} || ''; }
sub getTable			{ my $self = shift; return $self->{_table} || ''; }

1;
