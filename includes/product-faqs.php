<?php
/**
 * Product FAQ data for all 17 product pages.
 * Extracted verbatim from the live site's ElementsKit accordion widgets.
 * 5 questions per product.
 */
function getProductFaqs() {
    return [
        'distribution-transformers-oil-filled' => [
            ['q' => 'What is the primary function of a distribution transformer?', 'a' => 'It steps down high voltage from the power grid to levels suitable for residential and commercial use.'],
            ['q' => 'Are these transformers suitable for outdoor use?', 'a' => 'Yes, they are built with weather-resistant tanks and insulation.'],
            ['q' => 'How efficient are these transformers?', 'a' => 'They achieve high efficiency levels as per BIS and IEC standards.'],
            ['q' => 'Can they handle fluctuating load conditions?', 'a' => 'Yes, the design supports stable performance even under variable load.'],
            ['q' => 'What is the typical lifespan?', 'a' => 'With proper maintenance, over 25 years of dependable service.'],
        ],

        'power-transformers-oil-filled' => [
            ['q' => 'What differentiates power transformers from distribution transformers?', 'a' => 'Power transformers are used for high-voltage transmission, while distribution transformers deliver low-voltage power to end users.'],
            ['q' => 'Are these suitable for 24x7 operation?', 'a' => 'Yes, they are built for continuous load and thermal stability.'],
            ['q' => 'Can they be customized?', 'a' => 'Yes, voltage ratings and capacities can be tailored to specific applications.'],
            ['q' => 'What type of cooling system is used?', 'a' => 'Primarily oil natural air natural (ONAN) or oil forced air forced (OFAF).'],
            ['q' => 'Do they require regular maintenance?', 'a' => 'Periodic oil testing and inspection ensure long life and safe operation.'],
        ],

        'inverter-duty-transformers-oil-filled' => [
            ['q' => 'What makes inverter duty transformers unique?', 'a' => 'They are designed to manage harmonic currents from inverters efficiently.'],
            ['q' => 'Are they suitable for renewable energy plants?', 'a' => 'Yes, ideal for solar, wind, and hybrid installations.'],
            ['q' => 'How do they manage heat generation?', 'a' => 'Through optimized oil circulation and heat dissipation design.'],
            ['q' => 'Can they operate continuously?', 'a' => 'Yes, built for continuous duty under inverter operation.'],
            ['q' => 'Do they reduce system harmonics?', 'a' => 'Yes, through harmonic-optimized winding configuration.'],
        ],

        'converter-duty-transformers-oil-filled' => [
            ['q' => 'Where are converter duty transformers used?', 'a' => 'In rectifiers, drives, and industrial converters.'],
            ['q' => 'Can they handle voltage surges?', 'a' => 'Yes, equipped with surge protection and insulation.'],
            ['q' => 'What type of cooling is used?', 'a' => 'Oil natural or oil forced cooling as per capacity.'],
            ['q' => 'Do they reduce harmonics?', 'a' => 'Yes, through optimized core and winding design.'],
            ['q' => 'What is their efficiency range?', 'a' => 'Typically between 98-99% depending on load conditions.'],
        ],

        'furnace-duty-transformers-oil-filled' => [
            ['q' => 'Where are furnace duty transformers used?', 'a' => 'In steel, alloy, and foundry industries operating electric or induction furnaces.'],
            ['q' => 'Can they handle load fluctuations?', 'a' => 'Yes, they are designed for extreme cyclic load variations.'],
            ['q' => 'Are they air-cooled or oil-cooled?', 'a' => 'Typically oil-cooled for efficient thermal management.'],
            ['q' => 'How are they protected against overheating?', 'a' => 'Equipped with temperature sensors and oil circulation systems.'],
            ['q' => 'Do they meet industry standards?', 'a' => 'Yes, conform to IS, IEC, and ANSI standards.'],
        ],

        'rectifier-transformers-oil-filled' => [
            ['q' => 'What are the typical applications?', 'a' => 'Electroplating, traction, electrolysis, and DC supply systems.'],
            ['q' => 'Can they handle continuous DC loads?', 'a' => 'Yes, they are designed for uninterrupted duty.'],
            ['q' => 'Are harmonic effects minimized?', 'a' => 'Yes, through optimized winding design and vector grouping.'],
            ['q' => 'Do they support multiple pulse operations?', 'a' => 'Yes, 6-pulse, 12-pulse, or customized configurations.'],
            ['q' => 'What cooling methods are available?', 'a' => 'Oil natural (ONAN) or oil forced (OFAF) systems.'],
        ],

        'isolation-transformers-oil-filled' => [
            ['q' => 'Why use an isolation transformer?', 'a' => 'To isolate sensitive equipment from power disturbances.'],
            ['q' => 'Does it improve power quality?', 'a' => 'Yes, by reducing electrical noise and transients.'],
            ['q' => 'Is it suitable for hospitals and data centers?', 'a' => 'Yes, ideal for critical and sensitive operations.'],
            ['q' => 'Can it handle continuous loads?', 'a' => 'Yes, designed for 24x7 operation.'],
            ['q' => 'Does it need regular maintenance?', 'a' => 'Minimal maintenance apart from oil quality checks.'],
        ],

        'lightning-transformers-oil-filled' => [
            ['q' => 'What is the main function of a lightning transformer?', 'a' => 'To safeguard electrical systems from lightning and surge voltages.'],
            ['q' => 'Are they the same as surge arresters?', 'a' => 'No, they complement surge arresters by providing isolation and damping.'],
            ['q' => 'Can they be installed outdoors?', 'a' => 'Yes, built for outdoor conditions with weatherproof enclosures.'],
            ['q' => 'Do they require regular monitoring?', 'a' => 'Periodic inspection ensures continued protection performance.'],
            ['q' => 'How long do they last?', 'a' => 'Typically over 20 years with proper maintenance.'],
        ],

        'generator-transformers-oil-filled' => [
            ['q' => 'What is the purpose of a generator transformer?', 'a' => 'To step up generator output voltage for grid transmission.'],
            ['q' => 'Can it operate continuously at full load?', 'a' => 'Yes, designed for continuous full-load operation.'],
            ['q' => 'How is it cooled?', 'a' => 'Using oil natural or forced oil-air cooling systems.'],
            ['q' => 'Is it suitable for renewable energy generators?', 'a' => 'Yes, applicable for hydro, thermal, and solar power plants.'],
            ['q' => 'How long does it last?', 'a' => 'Typically 25-30 years with proper maintenance.'],
        ],

        'distribution-transformers-dry-type' => [
            ['q' => 'Where are VPI Distribution Transformers commonly used?', 'a' => 'In offices, malls, hospitals, and industrial facilities requiring safe, indoor power solutions.'],
            ['q' => 'What is the main advantage over oil-filled transformers?', 'a' => 'No oil means zero fire risk, lower maintenance, and eco-friendly operation.'],
            ['q' => 'Can they be installed outdoors?', 'a' => 'Yes, with appropriate enclosures and weatherproofing.'],
            ['q' => 'What cooling system is used?', 'a' => 'Air Natural (AN) or Air Forced (AF) systems.'],
            ['q' => 'How long do they last?', 'a' => 'Typically over 25 years with minimal maintenance.'],
        ],

        'power-transformer-dry-type' => [
            ['q' => 'Can these transformers handle continuous loads?', 'a' => 'Yes, built for 24/7 operation under rated conditions.'],
            ['q' => 'Are they suitable for high-rise buildings or substations?', 'a' => 'Yes, their compact, oil-free design makes them ideal for such applications.'],
            ['q' => 'What is the efficiency range?', 'a' => 'Typically between 98-99% depending on capacity.'],
            ['q' => 'Is maintenance required?', 'a' => 'Only periodic inspection and cleaning — no oil testing needed.'],
            ['q' => 'Can they be customized?', 'a' => 'Yes, according to project-specific voltage and load requirements.'],
        ],

        'inverter-duty-transformer-dry-type' => [
            ['q' => 'Are these transformers suitable for solar inverters?', 'a' => 'Yes, specifically designed for renewable energy systems.'],
            ['q' => 'How do they manage harmonics?', 'a' => 'Through harmonic-optimized winding and core design.'],
            ['q' => 'Do they require oil for cooling?', 'a' => 'No, they are air-cooled and completely oil-free.'],
            ['q' => 'Can they operate continuously?', 'a' => 'Yes, they are built for continuous inverter operation.'],
            ['q' => 'What voltage ratings are available?', 'a' => 'Customizable based on inverter and load requirements.'],
        ],

        'converter-duty-transformer-dry-type' => [
            ['q' => 'Where are converter duty transformers used?', 'a' => 'In rectifier and industrial converter systems.'],
            ['q' => 'How are they cooled?', 'a' => 'Through natural or forced air circulation.'],
            ['q' => 'Do they support continuous duty?', 'a' => 'Yes, designed for round-the-clock operation.'],
            ['q' => 'Are they safe for indoor installations?', 'a' => 'Absolutely — no oil means no fire hazard.'],
            ['q' => 'What is the expected efficiency?', 'a' => 'Approximately 98-99% depending on the load.'],
        ],

        'furnace-duty-transformer-dry-type' => [
            ['q' => 'What industries use Furnace Duty Transformers?', 'a' => 'Steel plants, foundries, and other metal-processing facilities.'],
            ['q' => 'Are they suitable for 24-hour operation?', 'a' => 'Yes, designed for continuous and cyclic loads.'],
            ['q' => 'What cooling method is used?', 'a' => 'Air Natural (AN) or Air Forced (AF).'],
            ['q' => 'Do they require special safety systems?', 'a' => 'No, their dry construction makes them inherently fire-safe.'],
            ['q' => 'Can they replace oil-filled furnace transformers?', 'a' => 'Yes, especially in fire-sensitive or indoor industrial setups.'],
        ],

        'lightning-transformer-dry-type' => [
            ['q' => 'What is the main purpose of a lightning transformer?', 'a' => 'To protect connected electrical systems from high-voltage surges.'],
            ['q' => 'Can it be used in substations?', 'a' => 'Yes, ideal for substations and industrial installations.'],
            ['q' => 'Does it require oil maintenance?', 'a' => 'No, it is completely dry and maintenance-free.'],
            ['q' => 'Can it operate in outdoor conditions?', 'a' => 'Yes, with appropriate weatherproofing.'],
            ['q' => 'How fast does it respond to a surge?', 'a' => 'Almost instantaneously — within microseconds.'],
        ],

        'isolation-transformer-dry-type' => [
            ['q' => 'Why use a VPI Isolation Transformer?', 'a' => 'To protect sensitive equipment from power disturbances and surges.'],
            ['q' => 'Can it be used in hospitals?', 'a' => 'Yes, it is ideal for medical and laboratory environments.'],
            ['q' => 'Does it improve power quality?', 'a' => 'Yes, by eliminating electrical noise and transients.'],
            ['q' => 'Is it suitable for industrial automation systems?', 'a' => 'Absolutely — ensures stable operation for control systems.'],
            ['q' => 'Is periodic maintenance required?', 'a' => 'Only basic cleaning; no oil or fluid servicing is needed.'],
        ],

        'generator-transformer-dry-type' => [
            ['q' => 'What is the role of a generator transformer?', 'a' => 'To adjust generator output voltage to grid or system levels.'],
            ['q' => 'Is it suitable for continuous operation?', 'a' => 'Yes, designed for long-duration generator duty.'],
            ['q' => 'Can it handle voltage fluctuations?', 'a' => 'Yes, with excellent dynamic voltage regulation.'],
            ['q' => 'Does it require cooling oil?', 'a' => 'No, it operates with air cooling only.'],
            ['q' => 'Can it be used in renewable power plants?', 'a' => 'Yes, widely used in solar and hydro generator systems.'],
        ],
    ];
}
