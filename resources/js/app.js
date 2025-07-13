import './bootstrap';
import * as Sentry from "@sentry/browser";
import { Integrations } from "@sentry/tracing";
import Alpine from 'alpinejs';
import { Replay } from "@sentry/replay";

window.Alpine = Alpine;

Alpine.start();




Sentry.init({
    dsn: "https://ffeac12d1661e50a4354bbb470d07721@o4509617335697409.ingest.de.sentry.io/4509617340022864",
    // This sets the sample rate to be 10%. You may want this to be 100% while
    // in development and sample at a lower rate in production
    replaysSessionSampleRate: 0.1,
    // If the entire session is not sampled, use the below sample rate to sample
    // sessions when an error occurs.
    replaysOnErrorSampleRate: 1.0,
    integrations: [
        Sentry.replayIntegration({
            // Additional SDK configuration goes in here, for example:
            maskAllText: true,
            blockAllMedia: true,
        }),
    ],
});